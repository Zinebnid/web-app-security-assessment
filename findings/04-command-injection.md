# Finding 04 — Command Injection

**Severity:** High  
**OWASP:** A03:2021 – Injection  
**URL:** http://localhost/vulnerabilities/exec/

## Description
The application passes user-supplied input directly to a system-level ping command without sanitization. An attacker can append arbitrary OS commands using shell metacharacters, which are executed by the server with the privileges of the web server process.

## Recon
The Command Injection page accepts an IP address and runs a ping against it. The underlying PHP code constructs a shell command using the user input directly.

## Testing
Submitted a valid IP followed by a command separator and a system command:

The server executed `whoami` and returned the web server's user identity.

## Exploit
Escalated to read sensitive system files:

Output included all system users: root, daemon, www-data, mysql, and others, confirming full file system read access.

## Severity Reasoning
Rated High because the attacker achieves arbitrary OS command execution on the server. The only limitation is the privilege level of the web server process (www-data), which in many configurations can be escalated further.

## Business Impact
An attacker can read arbitrary files, exfiltrate sensitive data, install backdoors, establish reverse shells, pivot to internal network systems, or cause complete server compromise. This is one of the most critical vulnerability classes in web application security.

## Screenshot
See ![Command Injection whoami](../SCREENSHOT%20%235.png)
![Command Injection passwd](../SCREENSHOT%20%236.png)
