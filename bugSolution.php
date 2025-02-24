This solution uses `flock` to acquire an exclusive lock on the counter file before accessing it. This ensures that only one process can modify the counter at a time, preventing the race condition.

```php
<?php
function incrementCounter() {
  $fp = fopen('counter.txt', 'c+'); // Create or open file
  if ($fp) {
    flock($fp, LOCK_EX); // Acquire exclusive lock
    $counter = (int) fgets($fp); // Read the counter from file
    $counter++;
    ftruncate($fp, 0); // Clear file contents
    fwrite($fp, $counter); // Write updated counter
    flock($fp, LOCK_UN); // Release lock
    fclose($fp);
  } else {
    echo "Error opening file!";
  }
}

incrementCounter();
?>
```