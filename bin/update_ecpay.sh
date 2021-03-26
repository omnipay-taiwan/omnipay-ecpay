curl -L https://github.com/ECPay/ECPayAIO_PHP/archive/refs/heads/master.zip --output ECPayAIO_PHP.zip
unzip ECPayAIO_PHP.zip
mkdir -p ../lib
mv ECPayAIO_PHP-master ../lib/ECPayAIO_PHP
rm ECPayAIO_PHP.zip
