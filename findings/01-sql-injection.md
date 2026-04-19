# Finding 01 — SQL Injection

**Severity:** High  
**OWASP:** A03:2021 – Injection  
**URL:** http://localhost/vulnerabilities/sqli/

## Description
The User ID parameter is passed directly into a SQL query without sanitization, allowing an attacker to manipulate the query logic and extract arbitrary data from the database.

## Recon
The SQL Injection page accepts a User ID input and queries the database to return user details. The parameter is passed via GET request: `?id=1&Submit=Submit`

## Testing
Submitted a single quote `'` to test for SQL error:

The application returned a raw MySQL error, confirming unsanitized input is passed directly to the database.

## Exploit
**Authentication Bypass:**

**UNION-based Data Extraction:**

Extracted credentials:
- admin : 5f4dcc3b5aa765d61d8327deb882cf99
- gordonb : e99a18c428cb38d5f260853678922e03
- pablo : 0d107d09f5bbe40cade3de5c71e9e9b7
- smithy : 5f4dcc3b5aa765d61d8327deb882cf99

## Severity Reasoning
Rated High because the vulnerability allows complete authentication bypass and full database extraction in a single request, requiring no special privileges or tools.

## Business Impact
An attacker can dump all user credentials, bypass login authentication, and potentially access or destroy the entire database. MD5 hashes are trivially crackable, meaning plaintext passwords are effectively exposed.

## Screenshot
See `/SCREENSHOT-1.png` and `/screenshots/SCREENSHOT #2.png`

## Remediation
See `/remediation/sqli_fix.php` — vulnerability fixed using prepared statements with parameterized queries.
