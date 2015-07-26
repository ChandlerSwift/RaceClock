<?php
set_time_limit (600);
touch('lockfile.tmp');

// setup
shell_exec('/usr/local/bin/gpio mode 7 out; /usr/local/bin/gpio mode 9 out; /usr/local/bin/gpio mode 8 out'); // Red Green Yellow
shell_exec("/usr/local/bin/gpio write 7 1; /usr/local/bin/gpio write 9 0; /usr/local/bin/gpio write 8 0");
sleep(2);

// Blink Yellow Light 3 Times (Ready)
shell_exec("/usr/local/bin/gpio write 7 0; /usr/local/bin/gpio write 9 1");
usleep(500000);
shell_exec("/usr/local/bin/gpio write 9 0");
usleep(500000);
shell_exec("/usr/local/bin/gpio write 9 1");
usleep(500000);
shell_exec("/usr/local/bin/gpio write 9 0");
usleep(500000);
shell_exec("/usr/local/bin/gpio write 9 1");
usleep(500000);
shell_exec("/usr/local/bin/gpio write 9 0");
usleep(500000);

echo 

// Turn on Green Light (Go)
shell_exec("/usr/local/bin/gpio write 8 1");
sleep(3);

// Turn all lights off
shell_exec("/usr/local/bin/gpio write 8 0");

echo $milliseconds = round(microtime(true) * 1000);
unlink('lockfile.tmp');
?>