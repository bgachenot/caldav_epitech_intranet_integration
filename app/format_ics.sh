#!/bin/bash

main () {
    # Remove "B-XXX-XXX >>" (module codename)
    perl -pi -e 's/([a-zA-Z]){1}-([a-zA-Z]){3}-(\d){3}( >> )//' "$LOCAL_FILE_PATH"

    # Remove all the description line and keep the last part which is the classroom to put it in a location
    perl -pi -e 's/(DESCRIPTION:)(.*?)\\n(.*?)\\n/LOCATION:/' "$LOCAL_FILE_PATH"
}

main