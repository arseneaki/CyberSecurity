# Linux Log Analysis Home Lab for beginner

## Introduction

![Caption Image for Github ](https://github.com/user-attachments/assets/32bbd488-aa5e-46cb-be1f-7f88a7fd6a6f)

In this Home Lab, you will explore various tools and techniques for analyzing Linux logs. This lab is designed to provide hands-on experience with different utilities that are commonly used in the field of log analysis and system administration. By the end of this lab, you will be proficient in using tools such as `journalctl`, `awk`, `tail`, and `logwatch` to extract, analyze, and visualize log data effectively.



## Pre-requisites

Before you begin, ensure you have the following:

1. A basic understanding of the Linux command-line interface (CLI).
2. A Linux system (preferably Ubuntu or CentOS) with root access.
3. An Internet connection for installing necessary packages.
4. Basic knowledge of text processing and system logs.

## Lab Setup

### Step 1: Setting Up Your Environment

1. **Install a Virtual Machine (VM):** If you don't have a Linux system, you can use a VM. Tools like VirtualBox or VMware Workstation can help you set up a Linux VM.
2. **Update Your System:** Ensure your system is up-to-date by running:
```bash
   sudo apt-get update && sudo apt-get upgrade
   # or for CentOS
   sudo yum update
```
### Step 2: Install Necessary Tools
1. Install journalctl (systemd journal): It should already be available if you are using a systemd-based distribution.
2. Install awk: This should come pre-installed on most Linux distributions.
3. Install tail: This should also come pre-installed on most Linux distributions.
4. Install logwatch:
```bash
sudo apt-get install logwatch
# or for CentOS
sudo yum install logwatch
```
5. Install ELK Stack (Elasticsearch, Logstash, Kibana):
- Follow the official installation guide for Elasticsearch.
- Follow the official installation guide for Logstash.
- Follow the official installation guide for Kibana.
  
## Tools
1. journalctl
journalctl is a command-line utility for querying and displaying logs from systemd's journal. It provides a powerful and flexible interface for examining logs generated by various services and the kernel.

2. awk
awk is a powerful text-processing language used for data extraction and reporting. It is particularly useful for parsing log files and extracting specific fields or patterns.

3. tail
tail is a command-line utility used to display the end of a text file or stream. It is commonly used to monitor log files in real-time.

4. logwatch
logwatch is a log analysis tool that generates detailed summaries of system logs. It provides insights into system activity and potential issues by aggregating and summarizing log entries.

5. Kibana
Kibana is an open-source data visualization dashboard for Elasticsearch. It provides powerful and flexible tools for visualizing log data and creating interactive dashboards.

### Exercise 1: Analyzing System Logs with journalctl
Introduction: journalctl is a command-line utility for querying and displaying logs from systemd's journal. It provides a powerful and flexible interface for examining logs generated by various services and the kernel.

Instructions and Sample Outputs:

1. View Recent Logs: Use journalctl to display the most recent logs.

```bash
journalctl -n 100
```
Expected Output:

```lua
-- Logs begin at Fri 2024-07-12 10:22:08 UTC, end at Sat 2024-07-20 10:25:03 UTC. --
Jul 20 10:24:53 hostname systemd[1]: Starting Daily apt upgrade and clean activities...
Jul 20 10:24:54 hostname kernel: [107945.787543] audit: type=1400 audit(1595271894.123:225): apparmor="STATUS" operation="profile_load" profile="unconfined"
...
```
2. Filter by Time: Filter logs to view entries from the last hour.

```bash
journalctl --since "1 hour ago"
```
Expected Output:

```lua
-- Logs begin at Fri 2024-07-12 10:22:08 UTC, end at Sat 2024-07-20 10:25:03 UTC. --
Jul 20 09:24:53 hostname systemd[1]: Starting Daily apt upgrade and clean activities...
Jul 20 09:24:54 hostname kernel: [107945.787543] audit: type=1400 audit(1595271894.123:225): apparmor="STATUS" operation="profile_load" profile="unconfined"
...
```
3. Filter by Service: Display logs for the sshd service.

```bash
journalctl -u ssh
```
Expected Output:

```sql
-- Logs begin at Fri 2024-07-12 10:22:08 UTC, end at Sat 2024-07-20 10:25:03 UTC. --
Jul 20 10:00:00 hostname sshd[12345]: Accepted password for user from 192.168.1.2 port 22 ssh2
Jul 20 10:00:01 hostname sshd[12345]: pam_unix(sshd:session): session opened for user user by (uid=0)
...
```
4. Search for Specific Keywords: Search logs for entries containing the keyword "error."

```bash
journalctl | grep "error"
```
Expected Output:

```yaml
Jul 20 10:12:34 hostname kernel: [107966.789543] EXT4-fs error (device sda1): ext4_find_entry:1456: inode #2: comm systemd: reading directory lblock 0
Jul 20 10:15:56 hostname sshd[12345]: error: PAM: Authentication failure for illegal user admin from 192.168.1.3
...
```
5. Persist Logs to File: Save logs from the last boot to a file for further analysis.

```bash
journalctl -b > logs_from_last_boot.txt
```
Expected Output:

A file named logs_from_last_boot.txt containing all logs since the last boot.

### Exercise 2: Parsing Log Files with awk
Introduction: awk is a powerful text-processing language used for data extraction and reporting. It is particularly useful for parsing log files and extracting specific fields or patterns.

Instructions and Sample Outputs:

1. Extract Specific Columns: Extract and display the date and time from /var/log/syslog.

```bash
awk '{print $1, $2, $3}' /var/log/syslog
```
Expected Output:

```python
Jul 20 10:24:53
Jul 20 10:24:54
...
```
2. Filter Entries by Keyword: Display log entries containing the word "root."

```bash
awk '/root/ {print $0}' /var/log/syslog
```
Expected Output:

```yaml
Jul 20 10:12:34 hostname kernel: [107966.789543] EXT4-fs error (device sda1): ext4_find_entry:1456: inode #2: comm systemd: reading directory lblock 0
Jul 20 10:15:56 hostname sshd[12345]: error: PAM: Authentication failure for illegal user admin from 192.168.1.3
...
```
3. Count Occurrences: Count the number of "failed" login attempts.

```bash
root@linux-mumb:~# awk '/root/ {count++} END {print count}' /var/log/auth.log

root@linux-mumb:~# awk '/login/ {count++} END {print count}' /var/log/auth.log

```
Expected Output:


4. Summarize Data: Summarize and display the number of entries per unique user in /var/log/auth.log.

```bash
awk '/session opened/ {user[$11]++} END {for (u in user) print u, user[u]}' /var/log/auth.log
```
Expected Output:

```python
user1 5
user2 3
...
```
5. Save Filtered Logs: Save entries with the keyword "warning" to a new file.

```bash
awk '/root/' /var/log/syslog > warning_logs.txt
```
Expected Output:

A file named warning_logs.txt containing log entries with the keyword "warning."

### Exercise 3: Monitoring Logs in Real-Time with tail
Introduction: tail is a command-line utility used to display the end of a text file or stream. It is commonly used to monitor log files in real-time.

Instructions and Sample Outputs:

1. View Last 10 Lines: Display the last 10 lines of /var/log/syslog.

```bash
tail /var/log/syslog
```
Expected Output:

```bash
Jul 20 10:24:53 hostname systemd[1]: Starting Daily apt upgrade and clean activities...
Jul 20 10:24:54 hostname kernel: [107945.787543] audit: type=1400 audit(1595271894.123:225): apparmor="STATUS" operation="profile_load" profile="unconfined"
...
```
2. Monitor Logs in Real-Time: Continuously monitor /var/log/syslog for new entries.

```bash
tail -f /var/log/syslog
```
Expected Output:

The terminal will continuously display new log entries as they are appended to /var/log/syslog.

3. Highlight Specific Keywords: Use grep with tail to highlight lines containing "error."

```bash
tail -f /var/log/syslog | grep --color=auto "error"
```
Expected Output:

The terminal will display new log entries containing the keyword "error," with the keyword highlighted.

4. Multiple Files Monitoring: Monitor multiple log files simultaneously.

```bash
tail -f /var/log/syslog /var/log/auth.log
```
Expected Output:

The terminal will display new log entries from both /var/log/syslog and /var/log/auth.log.

5. Limit Displayed Lines: Display the last 50 lines and then continue monitoring.

```bash
tail -n 50 -f /var/log/syslog
```
Expected Output:

The terminal will display the last 50 lines of /var/log/syslog and then continue to display new entries as they are appended.

### Exercise 4: Summarizing Logs with logwatch
Introduction: logwatch is a log analysis tool that generates detailed summaries of system logs. It provides insights into system activity and potential issues by aggregating and summarizing log entries.

Instructions and Sample Outputs:

1. Install Logwatch: Ensure logwatch is installed on your system.

```bash
sudo apt-get install logwatch
```
Expected Output:

Installation process output indicating successful installation.

2. Generate a Basic Report: Generate a default report for the past day.

```bash
sudo logwatch --detail low --range today
```
Expected Output:

```yaml
--------------------- Logwatch 7.5.2 (04/09/07) --------------------- 
 Processing Initiated: Fri Jul 20 10:30:00 2024 
 Date Range Processed: today 
 ( 2024-Jul-20 )
 Period is day.
 Detail Level of Output: 0 
 Type of Output/Format: stdout / text 
 Logfiles for Host: hostname
...
```
### Exercise 5: Using Auditd to Track System Events

**Objective**: Use Auditd to set up and analyze audit rules for tracking specific system events.

**Steps**:
1. Open a terminal.
2. Ensure the `auditd` service is running:
    ```bash
    sudo service auditd start
    ```
3. Add an audit rule to track all `chmod` commands:
    ```bash
    sudo auditctl -w /bin/chmod -p x -k chmod_changes
    ```
4. Generate some audit logs by running `chmod` commands:
    ```bash
    chmod 755 somefile
    ```
5. Search the audit logs for `chmod` events:
    ```bash
    sudo ausearch -k chmod_changes
    ```

**Expected Output**: You should be able to set up and analyze audit rules using Auditd, tracking specific system events and generating relevant logs.

---

With these exercises, you will gain practical experience in investigating Linux system logs for security incidents, leveraging various tools and techniques to enhance your analysis capabilities.

