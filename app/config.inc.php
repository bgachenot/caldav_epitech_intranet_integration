<?php
    // ***** DESTINATION *****
    /* Configure destination server and credentials */
    $config['CalDAV']['username'] = $_ENV["CALDAV_USERNAME"];
    $config['CalDAV']['password'] = $_ENV["CALDAV_PASSWORD"];

    // Convenience variables for configuration of Nextcloud destination
    $temp['Nextcloud']['domain'] = $_ENV["NEXTCLOUD_DOMAIN"];
    // in your Nextcloud click the three dots next to your calendar and click 'Link' - the string between the last two slashes is your calendar ID
    $temp['Nextcloud']['calendar'] = $_ENV["NEXTCLOUD_CALENDAR_ID"];

    // this url is used as CalDAV destination URL - fill out Nextcloud variables above, or adjust to your URL (especially on hosted instances)
    $config['CalDAV']['url'] = 'https://' . $temp['Nextcloud']['domain'] . '/remote.php/dav/calendars/' . $config['CalDAV']['username'] . '/' . $temp['Nextcloud']['calendar'] . '/';

    // ***** SOURCE *****
    // Configure source server and credentials
    $temp['source']['username'] = $config['CalDAV']['username'];
    $temp['source']['password'] = $config['CalDAV']['password'];
    $temp['source']['domain'] = $temp['Nextcloud']['domain'];
    $temp['source']['path'] = $_ENV["LOCAL_FILE_PATH"];

    $config['ICS']['url'] = $temp['source']['path'];

    // ***** LOGGING *****
    // Script uses Monolog (https://github.com/Seldaek/monolog#readme)
    use Monolog\Handler\StreamHandler;
    use Monolog\Formatter\LineFormatter;

    // Format log output
    $output_format = "[%datetime%] %level_name%: %message%\n";
    $datetime_format = "Y-m-d H:i:s";
    // Set verbosity to one of TRACE, DEBUG, INFO, ERROR, CRITICAL, EMERGENCY
    $config['loglevel'] = MyLogger::DEBUG;

    // automatically add <pre> tags around output if script isn't called by commandline interface
    $config['autopre'] = true;

    // Adjust to your needs. This example logs to output
    $formatter = new LineFormatter($output_format, $datetime_format);
    $streamHandler = new StreamHandler('php://output', $config['loglevel']);
    $streamHandler->setFormatter($formatter);
    $log->pushHandler($streamHandler);

    // delete temporary variable
    unset($temp);
    // constant to check in main script if config is included. Do not modify.
    define('CONFIG_LOADED', true);