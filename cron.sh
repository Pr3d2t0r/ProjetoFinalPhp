crontab -l > mycron
echo "0 */12 * * * php $1" >> mycron
crontab mycron
rm mycron
