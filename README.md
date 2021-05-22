# nagios-custom-dashboard-Unite
Unite Dashboard will combine multiple Nagios into single dashboard. You can easily monitor multiple Nagios dashboard in single window. 

**Features:**

Support multiple Nagios Application and display all servers status in single window.
Shows number of up/down/warning hosts.
Audio alert for any change in the service status. 
Responsive design.
Easy to customize.

**Requirements:**

Apache
PHP >= 5.3
Nagios Core Version >= 4.1.1 

**Instructions:**
1. You should have running Nagios Server and able to acccess Nagios data using json data URL: http://your-nagios-server/cgi-bin/statusjson.cgi?query=servicelist"
2. Open config.php file and update/add Nagios url, username and password
3. Access the page using http://yourdomain.com/Nagios-Unit...
