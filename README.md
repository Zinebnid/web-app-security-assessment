# Web Application Security Assessment

## Scope
Target: DVWA (Damn Vulnerable Web Application)  
Environment: Kali Linux + Docker  
Tools: Burp Suite, sqlmap  
Date: March 2026

## Methodology
Recon → Intercept → Test → Exploit → Validate → Document

## Findings Summary

| # | Vulnerability | Severity | OWASP | Business Impact |
|---|--------------|----------|-------|-----------------|
| 1 | SQL Injection | High | A03 | Full DB dump, auth bypass |
| 2 | Stored XSS | High | A03 | Session hijacking, account takeover |
| 3 | IDOR | High | A01 | Unauthorized access to user data |
| 4 | Command Injection | High | A03 | Full server compromise |
| 5 | CSRF | Medium | A01 | Account takeover via password change |

## Remediation
SQLi fixed using prepared statements (see /remediation/sqli_fix.php)

## Tools Used
- Burp Suite Community Edition
- sqlmap
- Docker + DVWA
