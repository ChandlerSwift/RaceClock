<?php
set_time_limit (600);
touch('lockfile.tmp');

// setup
shell_exec('/usr/local/bin/gpio mode 8 out; /usr/local/bin/gpio mode 9 out; /usr/local/bin/gpio mode 7 out');
shell_exec("/usr/local/bin/gpio write 8 1; /usr/local/bin/gpio write 9 0; /usr/local/bin/gpio write 7 0");
sleep(1);

// Blink Yellow Light 3 Times (Ready)
shell_exec("/usr/local/bin/gpio write 8 0; /usr/local/bin/gpio write 9 1");
usleep(500000);
shell_exec("/usr/local/bin/gpio write 9 0;");
usleep(500000);
shell_exec("/usr/local/bin/gpio write 9 1;");
usleep(500000);
shell_exec("/usr/local/bin/gpio write 9 0;");
usleep(500000);
shell_exec("/usr/local/bin/gpio write 9 1;");
usleep(500000);
shell_exec("/usr/local/bin/gpio write 9 0;");
usleep(500000);

// Turn on Green Light (Go)
shell_exec("/usr/local/bin/gpio write 8 0; /usr/local/bin/gpio write 9 0; /usr/local/bin/gpio write 7 1");
sleep(5);

// Turn all lights off
shell_exec("/usr/local/bin/gpio write 8 0; /usr/local/bin/gpio write 9 0; /usr/local/bin/gpio write 7 0");

echo $milliseconds = round(microtime(true) * 1000);
unlink('lockfile.tmp');
?>