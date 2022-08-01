# Waveform Generator

## Getting started:
1. Install psr-4 Autoloader and PHPUnit: ```$ composer install```.
2. Add data to ```input/customer-channel.txt``` and ```input/user-channel.txt```.
3. Run ```$ php bin/silence-detect.php``` from the project root directory.
4. The result will be printed in the console and saved in ```output/silence-detect.json```.

## Testing:
Run ```./vendor/bin/phpunit tests```