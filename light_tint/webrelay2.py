import RPi.GPIO as GPIO
# import smart_tint
import time
from flask import Flask, jsonify, abort, request, render_template
from relaydefinitions import relays, relayIdToPin
import threading

app = Flask(__name__)

GPIO.setmode(GPIO.BCM)

relayStateToGPIOState = {
    'off': GPIO.LOW,
    'on': GPIO.HIGH
}

global photocell_on
photocell_on = False



#TODO this goes with integration: try to get rid of the hardcoding
threshold = 700
relay_id = 1
photocell_id = 2

@app.before_first_request
def photocell_thread():

    def run():

        while photocell_on:
            photo_val = rc_time(relayIdToPin[photocell_id]) #hard coded to test photocell

            # Also the on/off button is backwards for the photocell

            # THIS LOGIC IS BACKWORDS - BUT IT WORKS
            # What it says: if bright turn on
            # What it does: if bright turn off

            # if photcell val is less than threshold but relay off: switch
            if photo_val < threshold:  # if bright turn off
                GPIO.output(relayIdToPin[1], relayStateToGPIOState["on"])


            # if photcell val is greater than threshold but relay on: switch
            else:
                GPIO.output(relayIdToPin[1], relayStateToGPIOState["off"])


            print(photo_val)
    thread = threading.Thread(target=run)
    thread.start()

def Setup():
    for relay in relays:
        print(relay['name'] + "    " + relay['state'])

        GPIO.setup(relayIdToPin[relay['id']], GPIO.OUT)
        GPIO.output(relayIdToPin[relay['id']], relayStateToGPIOState[relay['state']])


def UpdatePinFromRelayObject(relay):
    print(relay['name'] + "    " + relay['state'])
    GPIO.output(relayIdToPin[relay['id']], relayStateToGPIOState[relay['state']])

@app.route('/WebRelay/', methods=['GET'])
def index():
    return render_template('Index.html');

@app.route('/WebRelay/api/relays', methods=['GET'])
def get_relays():
    return jsonify({'relays': relays})


@app.route('/WebRelay/api/relays/<int:relay_id>', methods=['GET'])
def get_relay(relay_id):
    matchingRelays = [relay for relay in relays if relay['id'] == relay_id]
    if len(matchingRelays) == 0:
        abort(404)
    return jsonify({'relay': matchingRelays[0]})


@app.route('/WebRelay/api/relays/<int:relay_id>', methods=['PUT'])
def update_relay(relay_id):
    matchingRelays = [relay for relay in relays if relay['id'] == relay_id]

    if len(matchingRelays) == 0:
        abort(404)
    if not request.json:
        abort(400)
    if not 'state' in request.json:
        abort(400)


    relay = matchingRelays[0]


    if relay['id'] == 2:
        global photocell_on
        print(relay['state'])
        if relay['state'] == "on":
            photocell_on = True
            photocell_thread()
        else:
            photocell_on = False

    # turn of photocell control
    elif relay['state'] == 'on':
        GPIO.output(relayIdToPin[2], relayStateToGPIOState['off'])

    relay['state'] = request.json.get('state')
    UpdatePinFromRelayObject(relay)

    print(relay['name'] + "    " + relay['state'])

    return jsonify({'relay': relay})

def rc_time(photo_sensor_pin):
    count = 0

    # seems redundant got this error:
    # RuntimeError: Please set pin numbering mode using GPIO.setmode(GPIO.BOARD) or GPIO.setmode(GPIO.BCM)
    GPIO.setmode(GPIO.BCM)

    # Output on the pin for
    GPIO.setup(photo_sensor_pin, GPIO.OUT)
    GPIO.output(photo_sensor_pin, GPIO.LOW)
    time.sleep(0.1)

    # Change the pin back to input
    GPIO.setup(photo_sensor_pin, GPIO.IN)

    # Count until the pin goes high
    while (GPIO.input(photo_sensor_pin) == GPIO.LOW):
        count += 1

    GPIO.setup(photo_sensor_pin, GPIO.OUT)

    return count


if __name__ == "__main__":
    print("starting...")
    try:
        Setup()
        app.run(host='0.0.0.0', port=80, debug=False)
    finally:
        print("cleaning up")
        GPIO.cleanup()
