!/bin/sh
wpa_cli reconfigure
systemctl stop hostapd
systemctl start wpa_supplicant
configure_edison --wifi