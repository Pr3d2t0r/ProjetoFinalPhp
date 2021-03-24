set arg1=%1
schtasks /create /sc hourly /mo 12 /tn "Email Notification Sender" /tr "C:\xampp\php\php.exe \"%arg1%\""