import RPi.GPIO as GPIO
from flask import Flask, jsonify, abort, request, render_template
from relaydefinitions import relays, relayIdToPin

app = Flask(__name__)

GPIO.setmode(GPIO.BCM)

relayStateToGPIOState = {
    'off': GPIO.LOW,
    'on': GPIO.HIGH
}


def Setup():
    for relay in relays:
        GPIO.setup(relayIdToPin[relay['id']], GPIO.OUT)
        GPIO.output(relayIdToPin[relay['id']], relayStateToGPIOState[relay['state']])


def UpdatePinFromRelayObject(relay):
    GPIO.output(relayIdToPin[relay['id']], relayStateToGPIOState[relay['state']])


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
    relay['state'] = request.json.get('state')
    UpdatePinFromRelayObject(relay)
    return jsonify({'relay': relay})

# create virtual relay object "manual control"
# function that decides if the relay is controlled manually or by the photocell

# if manually, shut off access to photocell, and continue using update_relay()
# else send the thread into the while loop from our photocell function, adding the update relay command
# loop should always check to make sure virtual "manual control" relay is on or off, so the loop can be broken if the
# user wants to go back to manual - should automatically overide - maybe controlled from a station hub

if __name__ == "__main__":
    print("starting...")
    try:
        Setup()
        app.run(host='0.0.0.0', port=80, debug=False)
    finally:
        print("cleaning up")
        GPIO.cleanup()
