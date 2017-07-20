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
#
# History:
# Date      Author          Comments
# 04/18/17  Seth Tenembaum  Initial development.
#

# This program introduces the process of continually updating a graph.

from PiStorms import PiStorms
psm = PiStorms()
psm.screen.termPrintln("Please wait a moment")
psm.screen.termPrintln("as matplotlib loads...")
psm.screen.termPrintln("")
psm.screen.termPrintln("Press and hold GO briefly")
psm.screen.termPrintln("to stop the program running.")

import matplotlib
matplotlib.use("AGG")
import matplotlib.pyplot as plt
import numpy as np
import tempfile

plt.figure(figsize=(4,3), dpi=80)
plt.xlabel('time')
plt.ylabel('Voltage (V)')
plt.title('Battery Voltage')
plt.grid(True)

data = np.empty(0) # start with a completely empty data array
image = tempfile.NamedTemporaryFile() # we will be overwriting this same file

def mainLoop():
    data = np.append(data, psm.battVoltage()) # add a data point with the current battery voltage
    plt.plot(data, color="blue") # plot the data on the graph
    plt.tight_layout() # make sure the entire plot fits on screen
    plt.savefig(image.name, format="png") # save it
    psm.screen.fillBmp(0,0, 320,240, image.name) # show it on screen

psm.untilKeyPress(mainLoop)
