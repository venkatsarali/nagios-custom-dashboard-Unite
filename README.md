# nagios-custom-dashboard-Unite
Unite Dashboard will combine multiple Nagios into single dashboard. You can easily monitor multiple Nagios dashboard in single window. 

**Features:**

1. Support multiple Nagios Application and display all servers status in single window.
2. Shows number of up/down/warning hosts.
3. Audio alert for any change in the service status. 
4. Responsive design
5. Easy to customize.

**Requirements:**

Apache 2.4, PHP >= 5.3, Nagios Core Version >= 4.1.1 

**Instructions:**
1. You should have running Nagios Server and able to acccess Nagios data using json data URL: http://your-nagios-server/cgi-bin/statusjson.cgi?query=servicelist"
2. Open config.php file and update/add Nagios url, username and password
3. Access the page using http://yourdomain.com/nagios-custom-dashboard-Unite
