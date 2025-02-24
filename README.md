# PHP Race Condition: Inaccurate Counter Increment

This repository demonstrates a race condition in a simple PHP counter increment function. The function reads a counter value from a file, increments it, and writes it back.  However, if multiple requests hit the function concurrently, the counter may not accurately reflect the number of increments due to the non-atomic nature of `file_put_contents`.

The `bug.php` file contains the buggy code. The `bugSolution.php` demonstrates how to fix the problem using file locking or a database.