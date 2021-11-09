#!/bin/bash

wget "https://intra.epitech.eu/$AUTOLOGIN_TOKEN/planning/load?format=ical&onlymypromo=true&onlymymodule=true&onlymyevent=true&semester=0,1,10,2,3,4,5,6,7,8,9" -O "$LOCAL_FILE_PATH"