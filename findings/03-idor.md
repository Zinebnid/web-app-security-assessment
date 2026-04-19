# Finding 03 — Insecure Direct Object Reference (IDOR)

**Severity:** High  
**OWASP:** A01:2021 – Broken Access Control  
**URL:** http://localhost/vulnerabilities/sqli/?id=1&Submit=Submit

## Description
The application exposes user records via a numeric ID parameter in the URL. No authorization check is performed to verify whether the requesting user is permitted to access the requested record.

## Recon
The SQL Injection page accepts a `?id=` parameter in the GET request. The application queries the database for the user matching that ID and returns their details without verifying the identity of the requester.

## Testing
Accessed user ID 1 (admin):

## Exploit
Modified the `id` parameter from 1 to 2 directly in the browser URL bar:

No authentication or authorization check was performed. Any user can access any other user's data by incrementing the ID value.

## Severity Reasoning
Rated High because access control is entirely absent. An attacker can enumerate all user records by iterating the ID parameter, requiring only a browser and no special tools.

## Business Impact
In a real application this would expose all user profiles, private data, orders, messages, or financial records to any authenticated user. Combined with automation, an attacker could scrape the entire user database in minutes.

## Screenshot
See ![IDOR](../SCREENSHOT%20%234.png)
