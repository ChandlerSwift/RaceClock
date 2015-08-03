#!/usr/bin/env python3

import json              # Writes out JSON for web client
import datetime          # Allows collection of accurate times (to microsecond)
from time import sleep   # Allows waiting
#import select           # Allows for edge polling--or something
from os import remove    # Allows file deletion
from os import path      # Allows checking if file exists
import wiringpi2         # GPIO
import sqlite3           # Write to Database when done
from sys import argv     # Reads Command Line Arguments

def timeToString( time_us ): # something like 123456789 => 2:03.457
	timeMinutes      = int(time_us / datetime.timedelta(minutes = 1))
	timeSeconds      = int(time_us / datetime.timedelta(seconds = 1)) - (timeMinutes * 60)
	timeMilliseconds = int(round(time_us / datetime.timedelta(milliseconds = 1)
					   - (timeMinutes * 1000 * 60) - (timeSeconds * 1000)))
	return str(timeMinutes) + ":" + str(timeSeconds).zfill(2) + "." + str(timeMilliseconds).zfill(3)

# Indicate that we're running
open('lockfile.tmp', 'a').close()

# If for some reason, there's already a stop file there, delete it.
if path.exists("stop.tmp"):
	remove("stop.tmp")

# Sets initial JSON
data = {'status': 'normal', 'status-display': 'Queued', 'time': 'none-yet'}; 
with open('status.json', 'w') as outfile:
    json.dump(data, outfile)

# Set up I/O
wiringpi2.wiringPiSetup()
wiringpi2.pinMode(0, 1) # Red Light, Output
wiringpi2.pinMode(1, 1) # Yellow Light, Output
wiringpi2.pinMode(2, 1) # Green Light, Output
wiringpi2.pinMode(3, 0) # Laser Sensor Input

wiringpi2.digitalWrite(0,1)
sleep(1.5)
wiringpi2.digitalWrite(0,0)
sleep(.5)

wiringpi2.digitalWrite(1,1)
sleep(.5)
wiringpi2.digitalWrite(1,0)
sleep(.5)
wiringpi2.digitalWrite(1,1)
sleep(.5)
wiringpi2.digitalWrite(1,0)
sleep(.5)
wiringpi2.digitalWrite(1,1)
sleep(.5)
wiringpi2.digitalWrite(1,0)
sleep(.5)
wiringpi2.digitalWrite(2,1)
startTime = datetime.datetime.now()
data['status-display'] = 'In Progress'
with open('status.json', 'w') as outfile:
	json.dump(data, outfile)
sleep(2)
wiringpi2.digitalWrite(2,0)
sleep(5)

######### Wait for Laser to detect finish #########

while (wiringpi2.digitalRead(3)) and (not path.exists("stop.tmp")):
	sleep(.001) # Utilizes 20-30% of CPU with millisecond polling

if path.exists("stop.tmp"):
	remove("stop.tmp")
else: # Terminated by lap completion, write to database.
	endTime = datetime.datetime.now()
	timeTaken = endTime - startTime
	time_ms  = int(round(timeTaken / datetime.timedelta(milliseconds=1)))
	time_str = timeToString(timeTaken)
	script, userid, vehicle, track = argv
	conn = sqlite3.connect('../racing.db')
	c = conn.cursor()
	c.execute("INSERT INTO times (userid, vehicle, time_ms, time_str, track) VALUES (?,?,?,?,?)", (userid, vehicle, time_ms, time_str, track))
	conn.commit()
	conn.close()

	data['status'] = 'done'
	data['status-display'] = 'Complete'
	data['time'] = str(timeTaken)[:11]
	with open('status.json', 'w') as outfile:
		json.dump(data, outfile)

remove('lockfile.tmp')
