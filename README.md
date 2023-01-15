## How to generate code.

```
# Build the docker image.
docker build  -t dac .

# Run the docker container.
docker run -v $(pwd):/app/out dac generate

# Fix user permissions (Optional).
sudo chown $USER:$USER -R src

```