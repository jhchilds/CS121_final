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

@app.before_first_request
def light_thread():
    print("TESTING!")
    def run():
        print(photocell_on)
        while photocell_on:
            photo_val = rc_time(4) #hard coded to test photocell
            print(photo_val)
        print("TESTING 2")
    thread = threading.Thread(target=run)
    thread.start()





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

        
    # here is where the changing happens, all we need to do is insert the logic for our photocell
    # except this only fires when the button is clicked -  we need a process that will run infinitely

    relay = matchingRelays[0]

    # gets stuck, doesnt register when overridden
    # need to use 'threading' to allow commands to run in background/ override the while loop

    if relay['id'] == 2:
        print(relay['state'])
        if relay['state'] == "on":
            photocell_on = True
            light_thread()
        else:
            photocell_on = False



    relay['state'] = request.json.get('state')
    UpdatePinFromRelayObject(relay)
    return jsonify({'relay': relay})

# create virtual relay object "manual control"
# function that decides if the relay is controlled manually or by the photocell

# if manually, shut off access to photocell, and continue using update_relay()
# else send the thread into the while loop from our photocell function, adding the update relay command
# loop should always check to make sure virtual "manual control" relay is on or off, so the loop can be broken if the
# user wants to go back to manual - should automatically overide - maybe controlled from a station hub

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