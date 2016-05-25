#!/bin/sh
systemctl stop wpa_supplicant
systemctl start hostapd
echo 46 > /sys/class/gpio/export
echo out > /sys/class/gpio/gpio131/direction

