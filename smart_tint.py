#!/usr/local/bin/python

import RPi.GPIO as GPIO
import time

__author__ = 'Gus (Adapted from Adafruit)'
__license__ = "GPL"
__maintainer__ = "pimylifeup.com"

GPIO.setmode(GPIO.BCM)  # changed to BCM!!

threshold = 700

#keep track of current relay position
relay_on = False

# set up pins
photo_sensor_pin = 4  # altered for BCM
relay_pin = 21

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

    return count

def turn_relay_on(relay_pin):
    GPIO.output(relay_pin, GPIO.HIGH) 
    return True

def turn_relay_off(relay_pin):
    GPIO.output(relay_pin, GPIO.LOW) 
    return False

# Catch when script is interupted, cleanup correctly
try:
    # Main loop
    while True:
        
        current_val = rc_time(photo_sensor_pin)
        
        # if photcell val is less than threshold but relay off: switch
        if current_val < threshold:
            if not relay_on:
                turn_relay_on(relay_pin)

        # if photcell val is greater than threshold but relay on: switch
        else:
            if relay_on:
                turn_relay_off(relay_pin)


except KeyboardInterrupt:
    pass
finally:
    GPIO.cleanup()
