#!/usr/bin/env python
#
# Copyright (c) 2017 mindsensors.com
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License version 2 as
# published by the Free Software Foundation.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.    See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.
#
#mindsensors.com invests time and resources providing this open source code,
#please support mindsensors.com  by purchasing products from mindsensors.com!
#Learn more product option visit us @  http://www.mindsensors.com/

from PiStorms_GRX import PiStorms_GRX
from GroveDevices import Grove_UV_Sensor

psm = PiStorms_GRX()
uvSensor = Grove_UV_Sensor("BAA1")

m = ["Grove UV Sensor Demo",
     "Please connect a Grove UV sensor to port BAA1 (Bank A, Analog 1) and press OK (or GO) to continue."]
psm.screen.showMessage(m, wrapText=True)

def mainLoop():
    # note this takes an average of 1024 readings, it takes a moment
    reading = uvSensor.intensity()
    message = "UV intensity: " + str(reading)
    psm.screen.termPrintAt(0, message)

    # note this is an approximation
    index = uvSensor.UVindex()
    message = "UV index: " + str(index)
    psm.screen.termPrintAt(1, message)

psm.untilKeyPress(mainLoop)
