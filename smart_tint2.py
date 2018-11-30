import RPi.GPIO as GPIO
import time
#-----------------------------------------------------CITATION----------------------------------------------------------
__author__ = 'Gus (Adapted from Adafruit)'
__license__ = "GPL"
__maintainer__ = "pimylifeup.com"
#---------------------------------------------------END-CITATION--------------------------------------------------------

GPIO.setmode(GPIO.BCM)  # Big distinction between BCM and BOARD, we are using BCM now.



LIMIT = 500 # I don't remember what the max and min vals were, this should suffice as a light_level limit




# PIN setup
relay_pin = 21
photocell_pin = 4  # THIS IS NOW IN BCM

# Is our relay ON or OFF
def relay_condition(relay_condition):
    cur_relay_condition = relay_condition
    return cur_relay_condition

def relay_off(relay_pin):
    GPIO.output(relay_pin, GPIO.LOW)
    relay_condition(relay_off(relay_pin))
    return False

def relay_on(relay_pin):
    GPIO.output(relay_pin, GPIO.HIGH)
    relay_condition(relay_off(relay_pin))
    return True

def rc_time(photocell_pin): # FROM PIMYLIFE
    count = 0

    # Output on the pin for

    GPIO.setup(photocell_pin, GPIO.OUT)
    GPIO.output(photocell_pin, GPIO.LOW)
    time.sleep(0.1)

    # Change the pin back to input
    GPIO.setup(photocell_pin, GPIO.IN)

    # Count until the pin goes high
    while (GPIO.input(photocell_pin) == GPIO.LOW):
        count += 1

    return count

# Exception handling like in light_sensor.py
try:
    # ----------------------------------------------MAIN-----------------------------------------------
    while True:
        light_level = rc_time(photocell_pin) # resistance from photocell = light_level received by capacitor
        #  TURN RELAY ON WHEN LESS THAN LIMIT
        if light_level < LIMIT:
            if relay_condition(relay_condition) == relay_on:
                relay_on(relay_pin)

        #TEMP SETTINGS IF WE NEED
        # elif temp_level > TEMP_LIMIT:
        #     if relay_condition(relay_condition) == relay_on:
        #         relay_on(relay_pin)
        #
        # elif temp_level < TEMP_LIMIT:
        #     if relay_condition(relay_condition) == relay_off:
        #         relay_off(relay_pin)


        #  TURN RELAY OFF WHEN GREATER THAN LIMIT
        else:
            if relay_condition(relay_condition) == relay_on:
               relay_off(relay_pin)


except KeyboardInterrupt:
    pass
finally:
    GPIO.cleanup()
