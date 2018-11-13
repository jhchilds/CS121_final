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

#TODO this goes with integration: get rid of the hardcoding
threshold = 700
relay_id = 1
photocell_id = 2

@app.before_first_request
def photocell_thread():
    print("TESTING!")

    #TODO move photocell logic to a seperate file for the sake of organization
    def run():
        matchingRelays = [relay for relay in relays if relay['id'] == relay_id]
        relay = matchingRelays[0]

        print(photocell_on)
        relay_pin = 4
        while photocell_on:
            photo_val = rc_time(relay_pin) #hard coded to test photocell

            #TODO fix this spaghetti code.
            #Both photocell and 'manual control' can be on at the same time, which makes no sense.
            #Also the return values in the turn relay on/off functions no longer serve a purpose
            #but im not sure they should be deleted because maybe we should overwrite them with the
            #logic from 'relaydefinitions.py'.

            # Also the on/off button is backwards for the photocell

            #TODO integrate on/off logic to avoid collisions
            # Also currently the photocell successfully turns ON when there is no light, but doesn't
            # turn on again in the presence of light. I think it is somehow getting mixed signals from
            # our on/off logic and the legacy code's on/off logic, we will need to integrate.

            # if photcell val is less than threshold but relay off: switch
            if photo_val < threshold:
                if relay['state'] == "off":
                    relay_on = turn_relay_on(relayIdToPin[1])
                    time.sleep(1)

            # if photcell val is greater than threshold but relay on: switch
            else:
                if relay['state'] == "on":
                    relay_on = turn_relay_off(relayIdToPin[1])
                    time.sleep(1)

            print(photo_val)
        print("TESTING 2")
    thread = threading.Thread(target=run)
    thread.start()

def turn_relay_on(relay_pin):
    GPIO.output(relay_pin, GPIO.HIGH)
    return True

def turn_relay_off(relay_pin):
    GPIO.output(relay_pin, GPIO.LOW)
    return False


def Setup():
    for relay in relays:
        GPIO.setup(relayIdToPin[relay['id']], GPIO.OUT)
        GPIO.output(relayIdToPin[relay['id']], relayStateToGPIOState[relay['state']])


def UpdatePinFromRelayObject(relay):
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


    relay['state'] = request.json.get('state')
    UpdatePinFromRelayObject(relay)
    return jsonify({'relay': relay})

def rc_time(photo_sensor_pin):
    count = 0

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