<h1>path traversal attack & double encoding</h1>


<h2>1-Path Traversal Attack</h2>
<p>Path Traversal Attack is a type of attack where an attacker tries to access files or directories that are outside the intended directory on a server. This is achieved by exploiting a vulnerability in how the application processes file paths. The attacker manipulates input to traverse directories using sequences like`../`  (dot-dot-slash), potentially gaining unauthorized access to sensitive files.</p>



<h2>Prevention</h2>
<p>
Validate and sanitize input to ensure that file paths are restricted to intended directories.
Use secure path handling functions, such as realpath(), to verify that the resolved path is within the allowed directory.</p>



<h2>2-Double Encoding:</h2>
<p>Double Encoding is a technique where an attacker encodes data multiple times to bypass security filters that only decode once. This method exploits the application’s handling of encoded input, allowing attackers to pass data in a form that the application’s filters might not recognize as malicious.</p>

<h2>Prevention</h2>
<p>Properly decode and sanitize inputs before performing security checks.
Use comprehensive input validation and filtering techniques to handle all possible encodings.
Implement security mechanisms that are robust against various encoding schemes.</p>