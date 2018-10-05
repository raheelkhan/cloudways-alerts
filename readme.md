### Increase Performance and Reliablity
- pre-spawn maximum possible fpm child processes. This will continously consume memory but on the other hand it saves a time taken to fork the process first and then execute script

- Use PHP7 with OPCache enabled

- There is one I/O operation on disk (sql) since the user details are going to be same atleast not frequent change, we can cache those details such as email, slack channel etc to any in memory storage.

- Distribute API on multiple instances and use HAProxy (never tried) or something like that. (This will not only increase performance but also helps in high availability). 