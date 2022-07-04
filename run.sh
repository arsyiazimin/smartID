#!/bin/bash
while true
do
	php index.php Admin run_absen_mhs
	php index.php Admin run_absen_dosen
	sleep 2
done