<?php

namespace Tarekdj\Docker\ApiClient;

class Client extends \Tarekdj\Docker\ApiClient\Runtime\Client\Client
{
    /**
    * Returns a list of containers. For details on the format, see the
    [inspect endpoint](#operation/ContainerInspect).
    
    Note that it uses a different, smaller representation of a container
    than inspecting a single container. For example, the list of linked
    containers is not propagated .
    
    *
    * @param array $queryParameters {
    *     @var bool $all Return all containers. By default, only running containers are shown.
    
    *     @var int $limit Return this number of most recently created containers, including
    non-running ones.
    
    *     @var bool $size Return the size of container as fields `SizeRw` and `SizeRootFs`.
    
    *     @var string $filters Filters to process on the container list, encoded as JSON (a
    `map[string][]string`). For example, `{"status": ["paused"]}` will
    only return paused containers.
    
    Available filters:
    
    - `ancestor`=(`<image-name>[:<tag>]`, `<image id>`, or `<image@digest>`)
    - `before`=(`<container id>` or `<container name>`)
    - `expose`=(`<port>[/<proto>]`|`<startport-endport>/[<proto>]`)
    - `exited=<int>` containers with exit code of `<int>`
    - `health`=(`starting`|`healthy`|`unhealthy`|`none`)
    - `id=<ID>` a container's ID
    - `isolation=`(`default`|`process`|`hyperv`) (Windows daemon only)
    - `is-task=`(`true`|`false`)
    - `label=key` or `label="key=value"` of a container label
    - `name=<name>` a container's name
    - `network`=(`<network id>` or `<network name>`)
    - `publish`=(`<port>[/<proto>]`|`<startport-endport>/[<proto>]`)
    - `since`=(`<container id>` or `<container name>`)
    - `status=`(`created`|`restarting`|`running`|`removing`|`paused`|`exited`|`dead`)
    - `volume`=(`<volume name>` or `<mount point destination>`)
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerListBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerListInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\ContainerSummary[]|\Psr\Http\Message\ResponseInterface
    */
    public function containerList(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerList($queryParameters), $fetch);
    }
    /**
    * 
    *
    * @param \Tarekdj\Docker\ApiClient\Model\ContainersCreatePostBody $body Container to create
    * @param array $queryParameters {
    *     @var string $name Assign the specified name to the container. Must match
    `/?[a-zA-Z0-9][a-zA-Z0-9_.-]+`.
    
    *     @var string $platform Platform in the format `os[/arch[/variant]]` used for image lookup.
    
    When specified, the daemon checks if the requested image is present
    in the local image cache with the given OS and Architecture, and
    otherwise returns a `404` status.
    
    If the option is not set, the host's native OS and Architecture are
    used to look up the image in the image cache. However, if no platform
    is passed and the given image does exist in the local image cache,
    but its OS or architecture does not match, the container is created
    with the available image, and a warning is added to the `Warnings`
    field in the response, for example;
    
       WARNING: The requested image's platform (linux/arm64/v8) does not
                match the detected host platform (linux/amd64) and no
                specific platform was requested
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerCreateBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerCreateNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerCreateConflictException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerCreateInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\ContainersCreatePostResponse201|\Psr\Http\Message\ResponseInterface
    */
    public function containerCreate(\Tarekdj\Docker\ApiClient\Model\ContainersCreatePostBody $body, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerCreate($body, $queryParameters), $fetch);
    }
    /**
     * Return low-level information about a container.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     *     @var bool $size Return the size of container as fields `SizeRw` and `SizeRootFs`
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerInspectNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerInspectInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\ContainersIdJsonGetResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function containerInspect(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerInspect($id, $queryParameters), $fetch);
    }
    /**
    * On Unix systems, this is done by running the `ps` command. This endpoint
    is not supported on Windows.
    
    *
    * @param string $id ID or name of the container
    * @param array $queryParameters {
    *     @var string $ps_args The arguments to pass to `ps`. For example, `aux`
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerTopNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerTopInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\ContainersIdTopGetResponse200|\Psr\Http\Message\ResponseInterface
    */
    public function containerTop(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerTop($id, $queryParameters), $fetch);
    }
    /**
    * Get `stdout` and `stderr` logs from a container.
    
    Note: This endpoint works only for containers with the `json-file` or
    `journald` logging driver.
    
    *
    * @param string $id ID or name of the container
    * @param array $queryParameters {
    *     @var bool $follow Keep connection after returning logs.
    *     @var bool $stdout Return logs from `stdout`
    *     @var bool $stderr Return logs from `stderr`
    *     @var int $since Only return logs since this time, as a UNIX timestamp
    *     @var int $until Only return logs before this time, as a UNIX timestamp
    *     @var bool $timestamps Add timestamps to every log line
    *     @var string $tail Only return this number of log lines from the end of the logs.
    Specify as an integer or `all` to output all log lines.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerLogsNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerLogsInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function containerLogs(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerLogs($id, $queryParameters), $fetch);
    }
    /**
    * Returns which files in a container's filesystem have been added, deleted,
    or modified. The `Kind` of modification can be one of:
    
    - `0`: Modified
    - `1`: Added
    - `2`: Deleted
    
    *
    * @param string $id ID or name of the container
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerChangesNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerChangesInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\ContainersIdChangesGetResponse200Item[]|\Psr\Http\Message\ResponseInterface
    */
    public function containerChanges(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerChanges($id), $fetch);
    }
    /**
     * Export the contents of a container as a tarball.
     *
     * @param string $id ID or name of the container
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerExportNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerExportInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function containerExport(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerExport($id), $fetch);
    }
    /**
    * This endpoint returns a live stream of a container’s resource usage
    statistics.
    
    The `precpu_stats` is the CPU statistic of the *previous* read, and is
    used to calculate the CPU usage percentage. It is not an exact copy
    of the `cpu_stats` field.
    
    If either `precpu_stats.online_cpus` or `cpu_stats.online_cpus` is
    nil then for compatibility with older daemons the length of the
    corresponding `cpu_usage.percpu_usage` array should be used.
    
    On a cgroup v2 host, the following fields are not set
    * `blkio_stats`: all fields other than `io_service_bytes_recursive`
    * `cpu_stats`: `cpu_usage.percpu_usage`
    * `memory_stats`: `max_usage` and `failcnt`
    Also, `memory_stats.stats` fields are incompatible with cgroup v1.
    
    To calculate the values shown by the `stats` command of the docker cli tool
    the following formulas can be used:
    * used_memory = `memory_stats.usage - memory_stats.stats.cache`
    * available_memory = `memory_stats.limit`
    * Memory usage % = `(used_memory / available_memory) * 100.0`
    * cpu_delta = `cpu_stats.cpu_usage.total_usage - precpu_stats.cpu_usage.total_usage`
    * system_cpu_delta = `cpu_stats.system_cpu_usage - precpu_stats.system_cpu_usage`
    * number_cpus = `lenght(cpu_stats.cpu_usage.percpu_usage)` or `cpu_stats.online_cpus`
    * CPU usage % = `(cpu_delta / system_cpu_delta) * number_cpus * 100.0`
    
    *
    * @param string $id ID or name of the container
    * @param array $queryParameters {
    *     @var bool $stream Stream the output. If false, the stats will be output once and then
    it will disconnect.
    
    *     @var bool $one-shot Only get a single stat instead of waiting for 2 cycles. Must be used
    with `stream=false`.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerStatsNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerStatsInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function containerStats(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerStats($id, $queryParameters), $fetch);
    }
    /**
     * Resize the TTY for a container.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     *     @var int $h Height of the TTY session in characters
     *     @var int $w Width of the TTY session in characters
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerResizeNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerResizeInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function containerResize(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerResize($id, $queryParameters), $fetch);
    }
    /**
    * 
    *
    * @param string $id ID or name of the container
    * @param array $queryParameters {
    *     @var string $detachKeys Override the key sequence for detaching a container. Format is a
    single character `[a-Z]` or `ctrl-<value>` where `<value>` is one
    of: `a-z`, `@`, `^`, `[`, `,` or `_`.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerStartNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerStartInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function containerStart(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerStart($id, $queryParameters), $fetch);
    }
    /**
     * 
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     *     @var int $t Number of seconds to wait before killing the container
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerStopNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerStopInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function containerStop(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerStop($id, $queryParameters), $fetch);
    }
    /**
     * 
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     *     @var int $t Number of seconds to wait before killing the container
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerRestartNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerRestartInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function containerRestart(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerRestart($id, $queryParameters), $fetch);
    }
    /**
    * Send a POSIX signal to a container, defaulting to killing to the
    container.
    
    *
    * @param string $id ID or name of the container
    * @param array $queryParameters {
    *     @var string $signal Signal to send to the container as an integer or string (e.g. `SIGINT`).
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerKillNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerKillConflictException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerKillInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function containerKill(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerKill($id, $queryParameters), $fetch);
    }
    /**
    * Change various configuration options of a container without having to
    recreate it.
    
    *
    * @param string $id ID or name of the container
    * @param \Tarekdj\Docker\ApiClient\Model\ContainersIdUpdatePostBody $update 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerUpdateNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerUpdateInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\ContainersIdUpdatePostResponse200|\Psr\Http\Message\ResponseInterface
    */
    public function containerUpdate(string $id, \Tarekdj\Docker\ApiClient\Model\ContainersIdUpdatePostBody $update, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerUpdate($id, $update), $fetch);
    }
    /**
     * 
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     *     @var string $name New name for the container
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerRenameNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerRenameConflictException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerRenameInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function containerRename(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerRename($id, $queryParameters), $fetch);
    }
    /**
    * Use the freezer cgroup to suspend all processes in a container.
    
    Traditionally, when suspending a process the `SIGSTOP` signal is used,
    which is observable by the process being suspended. With the freezer
    cgroup the process is unaware, and unable to capture, that it is being
    suspended, and subsequently resumed.
    
    *
    * @param string $id ID or name of the container
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerPauseNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerPauseInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function containerPause(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerPause($id), $fetch);
    }
    /**
     * Resume a container which has been paused.
     *
     * @param string $id ID or name of the container
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerUnpauseNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerUnpauseInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function containerUnpause(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerUnpause($id), $fetch);
    }
    /**
    * Attach to a container to read its output or send it input. You can attach
    to the same container multiple times and you can reattach to containers
    that have been detached.
    
    Either the `stream` or `logs` parameter must be `true` for this endpoint
    to do anything.
    
    See the [documentation for the `docker attach` command](/engine/reference/commandline/attach/)
    for more details.
    
    ### Hijacking
    
    This endpoint hijacks the HTTP connection to transport `stdin`, `stdout`,
    and `stderr` on the same socket.
    
    This is the response from the daemon for an attach request:
    
    ```
    HTTP/1.1 200 OK
    Content-Type: application/vnd.docker.raw-stream
    
    [STREAM]
    ```
    
    After the headers and two new lines, the TCP connection can now be used
    for raw, bidirectional communication between the client and server.
    
    To hint potential proxies about connection hijacking, the Docker client
    can also optionally send connection upgrade headers.
    
    For example, the client sends this request to upgrade the connection:
    
    ```
    POST /containers/16253994b7c4/attach?stream=1&stdout=1 HTTP/1.1
    Upgrade: tcp
    Connection: Upgrade
    ```
    
    The Docker daemon will respond with a `101 UPGRADED` response, and will
    similarly follow with the raw stream:
    
    ```
    HTTP/1.1 101 UPGRADED
    Content-Type: application/vnd.docker.raw-stream
    Connection: Upgrade
    Upgrade: tcp
    
    [STREAM]
    ```
    
    ### Stream format
    
    When the TTY setting is disabled in [`POST /containers/create`](#operation/ContainerCreate),
    the stream over the hijacked connected is multiplexed to separate out
    `stdout` and `stderr`. The stream consists of a series of frames, each
    containing a header and a payload.
    
    The header contains the information which the stream writes (`stdout` or
    `stderr`). It also contains the size of the associated frame encoded in
    the last four bytes (`uint32`).
    
    It is encoded on the first eight bytes like this:
    
    ```go
    header := [8]byte{STREAM_TYPE, 0, 0, 0, SIZE1, SIZE2, SIZE3, SIZE4}
    ```
    
    `STREAM_TYPE` can be:
    
    - 0: `stdin` (is written on `stdout`)
    - 1: `stdout`
    - 2: `stderr`
    
    `SIZE1, SIZE2, SIZE3, SIZE4` are the four bytes of the `uint32` size
    encoded as big endian.
    
    Following the header is the payload, which is the specified number of
    bytes of `STREAM_TYPE`.
    
    The simplest way to implement this protocol is the following:
    
    1. Read 8 bytes.
    2. Choose `stdout` or `stderr` depending on the first byte.
    3. Extract the frame size from the last four bytes.
    4. Read the extracted size and output it on the correct output.
    5. Goto 1.
    
    ### Stream format when using a TTY
    
    When the TTY setting is enabled in [`POST /containers/create`](#operation/ContainerCreate),
    the stream is not multiplexed. The data exchanged over the hijacked
    connection is simply the raw data from the process PTY and client's
    `stdin`.
    
    *
    * @param string $id ID or name of the container
    * @param array $queryParameters {
    *     @var string $detachKeys Override the key sequence for detaching a container.Format is a single
    character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`,
    `@`, `^`, `[`, `,` or `_`.
    
    *     @var bool $logs Replay previous logs from the container.
    
    This is useful for attaching to a container that has started and you
    want to output everything since the container started.
    
    If `stream` is also enabled, once all the previous output has been
    returned, it will seamlessly transition into streaming current
    output.
    
    *     @var bool $stream Stream attached streams from the time the request was made onwards.
    
    *     @var bool $stdin Attach to `stdin`
    *     @var bool $stdout Attach to `stdout`
    *     @var bool $stderr Attach to `stderr`
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerAttachBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerAttachNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerAttachInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function containerAttach(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerAttach($id, $queryParameters), $fetch);
    }
    /**
    * 
    *
    * @param string $id ID or name of the container
    * @param array $queryParameters {
    *     @var string $detachKeys Override the key sequence for detaching a container.Format is a single
    character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`,
    `@`, `^`, `[`, `,`, or `_`.
    
    *     @var bool $logs Return logs
    *     @var bool $stream Return stream
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerAttachWebsocketBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerAttachWebsocketNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerAttachWebsocketInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function containerAttachWebsocket(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerAttachWebsocket($id, $queryParameters), $fetch);
    }
    /**
    * Block until a container stops, then returns the exit code.
    *
    * @param string $id ID or name of the container
    * @param array $queryParameters {
    *     @var string $condition Wait until a container state reaches the given condition.
    
    Defaults to `not-running` if omitted or empty.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerWaitBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerWaitNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerWaitInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\ContainerWaitResponse|\Psr\Http\Message\ResponseInterface
    */
    public function containerWait(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerWait($id, $queryParameters), $fetch);
    }
    /**
     * 
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     *     @var bool $v Remove anonymous volumes associated with the container.
     *     @var bool $force If the container is running, kill it before removing it.
     *     @var bool $link Remove the specified link associated with the container.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerDeleteBadRequestException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerDeleteNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerDeleteConflictException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerDeleteInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function containerDelete(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerDelete($id, $queryParameters), $fetch);
    }
    /**
     * Get a tar archive of a resource in the filesystem of container id.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     *     @var string $path Resource in the container’s filesystem to archive.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerArchiveBadRequestException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerArchiveNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerArchiveInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function containerArchive(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerArchive($id, $queryParameters), $fetch);
    }
    /**
    * A response header `X-Docker-Container-Path-Stat` is returned, containing
    a base64 - encoded JSON object with some filesystem header information
    about the path.
    
    *
    * @param string $id ID or name of the container
    * @param array $queryParameters {
    *     @var string $path Resource in the container’s filesystem to archive.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerArchiveInfoBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerArchiveInfoNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerArchiveInfoInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function containerArchiveInfo(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerArchiveInfo($id, $queryParameters), $fetch);
    }
    /**
    * Upload a tar archive to be extracted to a path in the filesystem of container id.
    `path` parameter is asserted to be a directory. If it exists as a file, 400 error
    will be returned with message "not a directory".
    
    *
    * @param string $id ID or name of the container
    * @param string|resource|\Psr\Http\Message\StreamInterface $inputStream The input stream must be a tar archive compressed with one of the
    following algorithms: `identity` (no compression), `gzip`, `bzip2`,
    or `xz`.
    
    * @param array $queryParameters {
    *     @var string $path Path to a directory in the container to extract the archive’s contents into. 
    *     @var string $noOverwriteDirNonDir If `1`, `true`, or `True` then it will be an error if unpacking the
    given content would cause an existing directory to be replaced with
    a non-directory and vice versa.
    
    *     @var string $copyUIDGID If `1`, `true`, then it will copy UID/GID maps to the dest file or
    dir
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\PutContainerArchiveBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\PutContainerArchiveForbiddenException
    * @throws \Tarekdj\Docker\ApiClient\Exception\PutContainerArchiveNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\PutContainerArchiveInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function putContainerArchive(string $id, $inputStream, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\PutContainerArchive($id, $inputStream, $queryParameters), $fetch);
    }
    /**
    * 
    *
    * @param array $queryParameters {
    *     @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`).
    
    Available filters:
    - `until=<timestamp>` Prune containers created before this timestamp. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon machine’s time.
    - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune containers with (or without, in case `label!=...` is used) the specified labels.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerPruneInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\ContainersPrunePostResponse200|\Psr\Http\Message\ResponseInterface
    */
    public function containerPrune(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerPrune($queryParameters), $fetch);
    }
    /**
    * Returns a list of images on the server. Note that it uses a different, smaller representation of an image than inspecting a single image.
    *
    * @param array $queryParameters {
    *     @var bool $all Show all images. Only images from a final layer (no children) are shown by default.
    *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
    process on the images list.
    
    Available filters:
    
    - `before`=(`<image-name>[:<tag>]`,  `<image id>` or `<image@digest>`)
    - `dangling=true`
    - `label=key` or `label="key=value"` of an image label
    - `reference`=(`<image-name>[:<tag>]`)
    - `since`=(`<image-name>[:<tag>]`,  `<image id>` or `<image@digest>`)
    
    *     @var bool $digests Show digest information as a `RepoDigests` field on each image.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ImageListInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\ImageSummary[]|\Psr\Http\Message\ResponseInterface
    */
    public function imageList(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ImageList($queryParameters), $fetch);
    }
    /**
    * Build an image from a tar archive with a `Dockerfile` in it.
    
    The `Dockerfile` specifies how the image is built from the tar archive. It is typically in the archive's root, but can be at a different path or have a different name by specifying the `dockerfile` parameter. [See the `Dockerfile` reference for more information](/engine/reference/builder/).
    
    The Docker daemon performs a preliminary validation of the `Dockerfile` before starting the build, and returns an error if the syntax is incorrect. After that, each instruction is run one-by-one until the ID of the new image is output.
    
    The build is canceled if the client drops the connection by quitting or being killed.
    
    *
    * @param string|resource|\Psr\Http\Message\StreamInterface $inputStream A tar archive compressed with one of the following algorithms: identity (no compression), gzip, bzip2, xz.
    * @param array $queryParameters {
    *     @var string $dockerfile Path within the build context to the `Dockerfile`. This is ignored if `remote` is specified and points to an external `Dockerfile`.
    *     @var string $t A name and optional tag to apply to the image in the `name:tag` format. If you omit the tag the default `latest` value is assumed. You can provide several `t` parameters.
    *     @var string $extrahosts Extra hosts to add to /etc/hosts
    *     @var string $remote A Git repository URI or HTTP/HTTPS context URI. If the URI points to a single text file, the file’s contents are placed into a file called `Dockerfile` and the image is built from that file. If the URI points to a tarball, the file is downloaded by the daemon and the contents therein used as the context for the build. If the URI points to a tarball and the `dockerfile` parameter is also specified, there must be a file with the corresponding path inside the tarball.
    *     @var bool $q Suppress verbose build output.
    *     @var bool $nocache Do not use the cache when building the image.
    *     @var string $cachefrom JSON array of images used for build cache resolution.
    *     @var string $pull Attempt to pull the image even if an older image exists locally.
    *     @var bool $rm Remove intermediate containers after a successful build.
    *     @var bool $forcerm Always remove intermediate containers, even upon failure.
    *     @var int $memory Set memory limit for build.
    *     @var int $memswap Total memory (memory + swap). Set as `-1` to disable swap.
    *     @var int $cpushares CPU shares (relative weight).
    *     @var string $cpusetcpus CPUs in which to allow execution (e.g., `0-3`, `0,1`).
    *     @var int $cpuperiod The length of a CPU period in microseconds.
    *     @var int $cpuquota Microseconds of CPU time that the container can get in a CPU period.
    *     @var string $buildargs JSON map of string pairs for build-time variables. Users pass these values at build-time. Docker uses the buildargs as the environment context for commands run via the `Dockerfile` RUN instruction, or for variable expansion in other `Dockerfile` instructions. This is not meant for passing secret values.
    
    For example, the build arg `FOO=bar` would become `{"FOO":"bar"}` in JSON. This would result in the query parameter `buildargs={"FOO":"bar"}`. Note that `{"FOO":"bar"}` should be URI component encoded.
    
    [Read more about the buildargs instruction.](/engine/reference/builder/#arg)
    
    *     @var int $shmsize Size of `/dev/shm` in bytes. The size must be greater than 0. If omitted the system uses 64MB.
    *     @var bool $squash Squash the resulting images layers into a single layer. *(Experimental release only.)*
    *     @var string $labels Arbitrary key/value labels to set on the image, as a JSON map of string pairs.
    *     @var string $networkmode Sets the networking mode for the run commands during build. Supported
    standard values are: `bridge`, `host`, `none`, and `container:<name|id>`.
    Any other value is taken as a custom network's name or ID to which this
    container should connect to.
    
    *     @var string $platform Platform in the format os[/arch[/variant]]
    *     @var string $target Target build stage
    *     @var string $outputs BuildKit output configuration
    * }
    * @param array $headerParameters {
    *     @var string $Content-type 
    *     @var string $X-Registry-Config This is a base64-encoded JSON object with auth configurations for multiple registries that a build may refer to.
    
    The key is a registry URL, and the value is an auth configuration object, [as described in the authentication section](#section/Authentication). For example:
    
    ```
    {
     "docker.example.com": {
       "username": "janedoe",
       "password": "hunter2"
     },
     "https://index.docker.io/v1/": {
       "username": "mobydock",
       "password": "conta1n3rize14"
     }
    }
    ```
    
    Only the registry domain name (and port if not the default 443) are required. However, for legacy reasons, the Docker Hub registry must be specified with both a `https://` prefix and a `/v1/` suffix even though Docker will prefer to use the v2 registry API.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ImageBuildBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ImageBuildInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function imageBuild($inputStream, array $queryParameters = array(), array $headerParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ImageBuild($inputStream, $queryParameters, $headerParameters), $fetch);
    }
    /**
    * 
    *
    * @param array $queryParameters {
    *     @var int $keep-storage Amount of disk space in bytes to keep for cache
    *     @var bool $all Remove all types of build cache
    *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
    process on the list of build cache objects.
    
    Available filters:
    
    - `until=<duration>`: duration relative to daemon's time, during which build cache was not used, in Go's duration format (e.g., '24h')
    - `id=<id>`
    - `parent=<id>`
    - `type=<string>`
    - `description=<string>`
    - `inuse`
    - `shared`
    - `private`
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\BuildPruneInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\BuildPrunePostResponse200|\Psr\Http\Message\ResponseInterface
    */
    public function buildPrune(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\BuildPrune($queryParameters), $fetch);
    }
    /**
    * Create an image by either pulling it from a registry or importing it.
    *
    * @param string $inputImage Image content if the value `-` has been specified in fromSrc query parameter
    * @param array $queryParameters {
    *     @var string $fromImage Name of the image to pull. The name may include a tag or digest. This parameter may only be used when pulling an image. The pull is cancelled if the HTTP connection is closed.
    *     @var string $fromSrc Source to import. The value may be a URL from which the image can be retrieved or `-` to read the image from the request body. This parameter may only be used when importing an image.
    *     @var string $repo Repository name given to an image when it is imported. The repo may include a tag. This parameter may only be used when importing an image.
    *     @var string $tag Tag or digest. If empty when pulling an image, this causes all tags for the given image to be pulled.
    *     @var string $message Set commit message for imported image.
    *     @var array $changes Apply `Dockerfile` instructions to the image that is created,
    for example: `changes=ENV DEBUG=true`.
    Note that `ENV DEBUG=true` should be URI component encoded.
    
    Supported `Dockerfile` instructions:
    `CMD`|`ENTRYPOINT`|`ENV`|`EXPOSE`|`ONBUILD`|`USER`|`VOLUME`|`WORKDIR`
    
    *     @var string $platform Platform in the format os[/arch[/variant]]
    * }
    * @param array $headerParameters {
    *     @var string $X-Registry-Auth A base64url-encoded auth configuration.
    
    Refer to the [authentication section](#section/Authentication) for
    details.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ImageCreateNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ImageCreateInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function imageCreate(string $inputImage, array $queryParameters = array(), array $headerParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ImageCreate($inputImage, $queryParameters, $headerParameters), $fetch);
    }
    /**
     * Return low-level information about an image.
     *
     * @param string $name Image name or id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ImageInspectNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ImageInspectInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\ImageInspect|\Psr\Http\Message\ResponseInterface
     */
    public function imageInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ImageInspect($name), $fetch);
    }
    /**
     * Return parent layers of an image.
     *
     * @param string $name Image name or ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ImageHistoryNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ImageHistoryInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\ImagesNameHistoryGetResponse200Item[]|\Psr\Http\Message\ResponseInterface
     */
    public function imageHistory(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ImageHistory($name), $fetch);
    }
    /**
    * Push an image to a registry.
    
    If you wish to push an image on to a private registry, that image must
    already have a tag which references the registry. For example,
    `registry.example.com/myimage:latest`.
    
    The push is cancelled if the HTTP connection is closed.
    
    *
    * @param string $name Image name or ID.
    * @param array $queryParameters {
    *     @var string $tag The tag to associate with the image on the registry.
    * }
    * @param array $headerParameters {
    *     @var string $X-Registry-Auth A base64url-encoded auth configuration.
    
    Refer to the [authentication section](#section/Authentication) for
    details.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ImagePushNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ImagePushInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function imagePush(string $name, array $queryParameters = array(), array $headerParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ImagePush($name, $queryParameters, $headerParameters), $fetch);
    }
    /**
     * Tag an image so that it becomes part of a repository.
     *
     * @param string $name Image name or ID to tag.
     * @param array $queryParameters {
     *     @var string $repo The repository to tag in. For example, `someuser/someimage`.
     *     @var string $tag The name of the new tag.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ImageTagBadRequestException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ImageTagNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ImageTagConflictException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ImageTagInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function imageTag(string $name, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ImageTag($name, $queryParameters), $fetch);
    }
    /**
    * Remove an image, along with any untagged parent images that were
    referenced by that image.
    
    Images can't be removed if they have descendant images, are being
    used by a running container or are being used by a build.
    
    *
    * @param string $name Image name or ID
    * @param array $queryParameters {
    *     @var bool $force Remove the image even if it is being used by stopped containers or has other tags
    *     @var bool $noprune Do not delete untagged parent images
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ImageDeleteNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ImageDeleteConflictException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ImageDeleteInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\ImageDeleteResponseItem[]|\Psr\Http\Message\ResponseInterface
    */
    public function imageDelete(string $name, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ImageDelete($name, $queryParameters), $fetch);
    }
    /**
    * Search for an image on Docker Hub.
    *
    * @param array $queryParameters {
    *     @var string $term Term to search
    *     @var int $limit Maximum number of results to return
    *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to process on the images list. Available filters:
    
    - `is-automated=(true|false)`
    - `is-official=(true|false)`
    - `stars=<number>` Matches images that has at least 'number' stars.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ImageSearchInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\ImagesSearchGetResponse200Item[]|\Psr\Http\Message\ResponseInterface
    */
    public function imageSearch(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ImageSearch($queryParameters), $fetch);
    }
    /**
    * 
    *
    * @param array $queryParameters {
    *     @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`). Available filters:
    
    - `dangling=<boolean>` When set to `true` (or `1`), prune only
      unused *and* untagged images. When set to `false`
      (or `0`), all unused images are pruned.
    - `until=<string>` Prune images created before this timestamp. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon machine’s time.
    - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune images with (or without, in case `label!=...` is used) the specified labels.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ImagePruneInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\ImagesPrunePostResponse200|\Psr\Http\Message\ResponseInterface
    */
    public function imagePrune(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ImagePrune($queryParameters), $fetch);
    }
    /**
    * Validate credentials for a registry and, if available, get an identity
    token for accessing the registry without password.
    
    *
    * @param \Tarekdj\Docker\ApiClient\Model\AuthConfig $authConfig Authentication to check
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\SystemAuthUnauthorizedException
    * @throws \Tarekdj\Docker\ApiClient\Exception\SystemAuthInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\AuthPostResponse200|\Psr\Http\Message\ResponseInterface
    */
    public function systemAuth(\Tarekdj\Docker\ApiClient\Model\AuthConfig $authConfig, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SystemAuth($authConfig), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\SystemInfoInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\SystemInfo|\Psr\Http\Message\ResponseInterface
     */
    public function systemInfo(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SystemInfo(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\SystemVersionInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\SystemVersion|\Psr\Http\Message\ResponseInterface
     */
    public function systemVersion(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SystemVersion(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\SystemPingInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function systemPing(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SystemPing(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\SystemPingHeadInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function systemPingHead(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SystemPingHead(), $fetch);
    }
    /**
     * 
     *
     * @param \Tarekdj\Docker\ApiClient\Model\ContainerConfig $containerConfig The container configuration
     * @param array $queryParameters {
     *     @var string $container The ID or name of the container to commit
     *     @var string $repo Repository name for the created image
     *     @var string $tag Tag name for the create image
     *     @var string $comment Commit message
     *     @var string $author Author of the image (e.g., `John Hannibal Smith <hannibal@a-team.com>`)
     *     @var bool $pause Whether to pause the container before committing
     *     @var string $changes `Dockerfile` instructions to apply while committing
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ImageCommitNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ImageCommitInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\IdResponse|\Psr\Http\Message\ResponseInterface
     */
    public function imageCommit(\Tarekdj\Docker\ApiClient\Model\ContainerConfig $containerConfig, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ImageCommit($containerConfig, $queryParameters), $fetch);
    }
    /**
    * Stream real-time events from the server.
    
    Various objects within Docker report events when something happens to them.
    
    Containers report these events: `attach`, `commit`, `copy`, `create`, `destroy`, `detach`, `die`, `exec_create`, `exec_detach`, `exec_start`, `exec_die`, `export`, `health_status`, `kill`, `oom`, `pause`, `rename`, `resize`, `restart`, `start`, `stop`, `top`, `unpause`, `update`, and `prune`
    
    Images report these events: `delete`, `import`, `load`, `pull`, `push`, `save`, `tag`, `untag`, and `prune`
    
    Volumes report these events: `create`, `mount`, `unmount`, `destroy`, and `prune`
    
    Networks report these events: `create`, `connect`, `disconnect`, `destroy`, `update`, `remove`, and `prune`
    
    The Docker daemon reports these events: `reload`
    
    Services report these events: `create`, `update`, and `remove`
    
    Nodes report these events: `create`, `update`, and `remove`
    
    Secrets report these events: `create`, `update`, and `remove`
    
    Configs report these events: `create`, `update`, and `remove`
    
    The Builder reports `prune` events
    
    *
    * @param array $queryParameters {
    *     @var string $since Show events created since this timestamp then stream new events.
    *     @var string $until Show events created until this timestamp then stop streaming.
    *     @var string $filters A JSON encoded value of filters (a `map[string][]string`) to process on the event list. Available filters:
    
    - `config=<string>` config name or ID
    - `container=<string>` container name or ID
    - `daemon=<string>` daemon name or ID
    - `event=<string>` event type
    - `image=<string>` image name or ID
    - `label=<string>` image or container label
    - `network=<string>` network name or ID
    - `node=<string>` node ID
    - `plugin`=<string> plugin name or ID
    - `scope`=<string> local or swarm
    - `secret=<string>` secret name or ID
    - `service=<string>` service name or ID
    - `type=<string>` object to filter by, one of `container`, `image`, `volume`, `network`, `daemon`, `plugin`, `node`, `service`, `secret` or `config`
    - `volume=<string>` volume name
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\SystemEventsBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\SystemEventsInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\EventMessage|\Psr\Http\Message\ResponseInterface
    */
    public function systemEvents(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SystemEvents($queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\SystemDataUsageInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\SystemDfGetResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function systemDataUsage(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SystemDataUsage(), $fetch);
    }
    /**
    * Get a tarball containing all images and metadata for a repository.
    
    If `name` is a specific name and tag (e.g. `ubuntu:latest`), then only that image (and its parents) are returned. If `name` is an image ID, similarly only that image (and its parents) are returned, but with the exclusion of the `repositories` file in the tarball, as there were no image names referenced.
    
    ### Image tarball format
    
    An image tarball contains one directory per image layer (named using its long ID), each containing these files:
    
    - `VERSION`: currently `1.0` - the file format version
    - `json`: detailed layer information, similar to `docker inspect layer_id`
    - `layer.tar`: A tarfile containing the filesystem changes in this layer
    
    The `layer.tar` file contains `aufs` style `.wh..wh.aufs` files and directories for storing attribute changes and deletions.
    
    If the tarball defines a repository, the tarball should also include a `repositories` file at the root that contains a list of repository and tag names mapped to layer IDs.
    
    ```json
    {
     "hello-world": {
       "latest": "565a9d68a73f6706862bfe8409a7f659776d4d60a8d096eb4a3cbce6999cc2a1"
     }
    }
    ```
    
    *
    * @param string $name Image name or ID
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ImageGetInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function imageGet(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ImageGet($name), $fetch);
    }
    /**
    * Get a tarball containing all images and metadata for several image
    repositories.
    
    For each value of the `names` parameter: if it is a specific name and
    tag (e.g. `ubuntu:latest`), then only that image (and its parents) are
    returned; if it is an image ID, similarly only that image (and its parents)
    are returned and there would be no names referenced in the 'repositories'
    file for this image ID.
    
    For details on the format, see the [export image endpoint](#operation/ImageGet).
    
    *
    * @param array $queryParameters {
    *     @var array $names Image names to filter by
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ImageGetAllInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function imageGetAll(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ImageGetAll($queryParameters), $fetch);
    }
    /**
    * Load a set of images and tags into a repository.
    
    For details on the format, see the [export image endpoint](#operation/ImageGet).
    
    *
    * @param string|resource|\Psr\Http\Message\StreamInterface $imagesTarball Tar archive containing images
    * @param array $queryParameters {
    *     @var bool $quiet Suppress progress details during load.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ImageLoadInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function imageLoad($imagesTarball, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ImageLoad($imagesTarball, $queryParameters), $fetch);
    }
    /**
     * Run a command inside a running container.
     *
     * @param string $id ID or name of container
     * @param \Tarekdj\Docker\ApiClient\Model\ContainersIdExecPostBody $execConfig Exec configuration
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerExecNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerExecConflictException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerExecInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\IdResponse|\Psr\Http\Message\ResponseInterface
     */
    public function containerExec(string $id, \Tarekdj\Docker\ApiClient\Model\ContainersIdExecPostBody $execConfig, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ContainerExec($id, $execConfig), $fetch);
    }
    /**
    * Starts a previously set up exec instance. If detach is true, this endpoint
    returns immediately after starting the command. Otherwise, it sets up an
    interactive session with the command.
    
    *
    * @param string $id Exec instance ID
    * @param \Tarekdj\Docker\ApiClient\Model\ExecIdStartPostBody $execStartConfig 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ExecStartNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ExecStartConflictException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function execStart(string $id, \Tarekdj\Docker\ApiClient\Model\ExecIdStartPostBody $execStartConfig, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ExecStart($id, $execStartConfig), $fetch);
    }
    /**
    * Resize the TTY session used by an exec instance. This endpoint only works
    if `tty` was specified as part of creating and starting the exec instance.
    
    *
    * @param string $id Exec instance ID
    * @param array $queryParameters {
    *     @var int $h Height of the TTY session in characters
    *     @var int $w Width of the TTY session in characters
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ExecResizeBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ExecResizeNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ExecResizeInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function execResize(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ExecResize($id, $queryParameters), $fetch);
    }
    /**
     * Return low-level information about an exec instance.
     *
     * @param string $id Exec instance ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ExecInspectNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ExecInspectInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\ExecIdJsonGetResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function execInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ExecInspect($id), $fetch);
    }
    /**
    * 
    *
    * @param array $queryParameters {
    *     @var string $filters JSON encoded value of the filters (a `map[string][]string`) to
    process on the volumes list. Available filters:
    
    - `dangling=<boolean>` When set to `true` (or `1`), returns all
      volumes that are not in use by a container. When set to `false`
      (or `0`), only volumes that are in use by one or more
      containers are returned.
    - `driver=<volume-driver-name>` Matches volumes based on their driver.
    - `label=<key>` or `label=<key>:<value>` Matches volumes based on
      the presence of a `label` alone or a `label` and a value.
    - `name=<volume-name>` Matches all or part of a volume name.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\VolumeListInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\VolumeListResponse|\Psr\Http\Message\ResponseInterface
    */
    public function volumeList(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\VolumeList($queryParameters), $fetch);
    }
    /**
     * 
     *
     * @param \Tarekdj\Docker\ApiClient\Model\VolumeCreateOptions $volumeConfig Volume configuration
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\VolumeCreateInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\Volume|\Psr\Http\Message\ResponseInterface
     */
    public function volumeCreate(\Tarekdj\Docker\ApiClient\Model\VolumeCreateOptions $volumeConfig, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\VolumeCreate($volumeConfig), $fetch);
    }
    /**
     * Instruct the driver to remove the volume.
     *
     * @param string $name Volume name or ID
     * @param array $queryParameters {
     *     @var bool $force Force the removal of the volume
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\VolumeDeleteNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\VolumeDeleteConflictException
     * @throws \Tarekdj\Docker\ApiClient\Exception\VolumeDeleteInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function volumeDelete(string $name, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\VolumeDelete($name, $queryParameters), $fetch);
    }
    /**
     * 
     *
     * @param string $name Volume name or ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\VolumeInspectNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\VolumeInspectInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\Volume|\Psr\Http\Message\ResponseInterface
     */
    public function volumeInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\VolumeInspect($name), $fetch);
    }
    /**
    * 
    *
    * @param array $queryParameters {
    *     @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`).
    
    Available filters:
    - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune volumes with (or without, in case `label!=...` is used) the specified labels.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\VolumePruneInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\VolumesPrunePostResponse200|\Psr\Http\Message\ResponseInterface
    */
    public function volumePrune(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\VolumePrune($queryParameters), $fetch);
    }
    /**
    * Returns a list of networks. For details on the format, see the
    [network inspect endpoint](#operation/NetworkInspect).
    
    Note that it uses a different, smaller representation of a network than
    inspecting a single network. For example, the list of containers attached
    to the network is not propagated in API versions 1.28 and up.
    
    *
    * @param array $queryParameters {
    *     @var string $filters JSON encoded value of the filters (a `map[string][]string`) to process
    on the networks list.
    
    Available filters:
    
    - `dangling=<boolean>` When set to `true` (or `1`), returns all
      networks that are not in use by a container. When set to `false`
      (or `0`), only networks that are in use by one or more
      containers are returned.
    - `driver=<driver-name>` Matches a network's driver.
    - `id=<network-id>` Matches all or part of a network ID.
    - `label=<key>` or `label=<key>=<value>` of a network label.
    - `name=<network-name>` Matches all or part of a network name.
    - `scope=["swarm"|"global"|"local"]` Filters networks by scope (`swarm`, `global`, or `local`).
    - `type=["custom"|"builtin"]` Filters networks by type. The `custom` keyword returns all user-defined networks.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkListInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\Network[]|\Psr\Http\Message\ResponseInterface
    */
    public function networkList(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\NetworkList($queryParameters), $fetch);
    }
    /**
     * 
     *
     * @param string $id Network ID or name
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkDeleteForbiddenException
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkDeleteNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkDeleteInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function networkDelete(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\NetworkDelete($id), $fetch);
    }
    /**
     * 
     *
     * @param string $id Network ID or name
     * @param array $queryParameters {
     *     @var bool $verbose Detailed inspect output for troubleshooting
     *     @var string $scope Filter the network by scope (swarm, global, or local)
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkInspectNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkInspectInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\Network|\Psr\Http\Message\ResponseInterface
     */
    public function networkInspect(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\NetworkInspect($id, $queryParameters), $fetch);
    }
    /**
     * 
     *
     * @param \Tarekdj\Docker\ApiClient\Model\NetworksCreatePostBody $networkConfig Network configuration
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkCreateForbiddenException
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkCreateNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkCreateInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\NetworksCreatePostResponse201|\Psr\Http\Message\ResponseInterface
     */
    public function networkCreate(\Tarekdj\Docker\ApiClient\Model\NetworksCreatePostBody $networkConfig, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\NetworkCreate($networkConfig), $fetch);
    }
    /**
     * 
     *
     * @param string $id Network ID or name
     * @param \Tarekdj\Docker\ApiClient\Model\NetworksIdConnectPostBody $container 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkConnectForbiddenException
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkConnectNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkConnectInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function networkConnect(string $id, \Tarekdj\Docker\ApiClient\Model\NetworksIdConnectPostBody $container, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\NetworkConnect($id, $container), $fetch);
    }
    /**
     * 
     *
     * @param string $id Network ID or name
     * @param \Tarekdj\Docker\ApiClient\Model\NetworksIdDisconnectPostBody $container 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkDisconnectForbiddenException
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkDisconnectNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkDisconnectInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function networkDisconnect(string $id, \Tarekdj\Docker\ApiClient\Model\NetworksIdDisconnectPostBody $container, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\NetworkDisconnect($id, $container), $fetch);
    }
    /**
    * 
    *
    * @param array $queryParameters {
    *     @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`).
    
    Available filters:
    - `until=<timestamp>` Prune networks created before this timestamp. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon machine’s time.
    - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune networks with (or without, in case `label!=...` is used) the specified labels.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkPruneInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\NetworksPrunePostResponse200|\Psr\Http\Message\ResponseInterface
    */
    public function networkPrune(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\NetworkPrune($queryParameters), $fetch);
    }
    /**
    * Returns information about installed plugins.
    *
    * @param array $queryParameters {
    *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
    process on the plugin list.
    
    Available filters:
    
    - `capability=<capability name>`
    - `enable=<true>|<false>`
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginListInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\Plugin[]|\Psr\Http\Message\ResponseInterface
    */
    public function pluginList(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\PluginList($queryParameters), $fetch);
    }
    /**
    * 
    *
    * @param array $queryParameters {
    *     @var string $remote The name of the plugin. The `:latest` tag is optional, and is the
    default if omitted.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\GetPluginPrivilegesInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\PluginPrivilege[]|\Psr\Http\Message\ResponseInterface
    */
    public function getPluginPrivileges(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\GetPluginPrivileges($queryParameters), $fetch);
    }
    /**
    * Pulls and installs a plugin. After the plugin is installed, it can be
    enabled using the [`POST /plugins/{name}/enable` endpoint](#operation/PostPluginsEnable).
    
    *
    * @param \Tarekdj\Docker\ApiClient\Model\PluginPrivilege[] $body 
    * @param array $queryParameters {
    *     @var string $remote Remote reference for plugin to install.
    
    The `:latest` tag is optional, and is used as the default if omitted.
    
    *     @var string $name Local name for the pulled plugin.
    
    The `:latest` tag is optional, and is used as the default if omitted.
    
    * }
    * @param array $headerParameters {
    *     @var string $X-Registry-Auth A base64url-encoded auth configuration to use when pulling a plugin
    from a registry.
    
    Refer to the [authentication section](#section/Authentication) for
    details.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginPullInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function pluginPull(array $body, array $queryParameters = array(), array $headerParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\PluginPull($body, $queryParameters, $headerParameters), $fetch);
    }
    /**
    * 
    *
    * @param string $name The name of the plugin. The `:latest` tag is optional, and is the
    default if omitted.
    
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginInspectNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginInspectInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\Plugin|\Psr\Http\Message\ResponseInterface
    */
    public function pluginInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\PluginInspect($name), $fetch);
    }
    /**
    * 
    *
    * @param string $name The name of the plugin. The `:latest` tag is optional, and is the
    default if omitted.
    
    * @param array $queryParameters {
    *     @var bool $force Disable the plugin before removing. This may result in issues if the
    plugin is in use by a container.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginDeleteNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginDeleteInternalServerErrorException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\Plugin|\Psr\Http\Message\ResponseInterface
    */
    public function pluginDelete(string $name, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\PluginDelete($name, $queryParameters), $fetch);
    }
    /**
    * 
    *
    * @param string $name The name of the plugin. The `:latest` tag is optional, and is the
    default if omitted.
    
    * @param array $queryParameters {
    *     @var int $timeout Set the HTTP client timeout (in seconds)
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginEnableNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginEnableInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function pluginEnable(string $name, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\PluginEnable($name, $queryParameters), $fetch);
    }
    /**
    * 
    *
    * @param string $name The name of the plugin. The `:latest` tag is optional, and is the
    default if omitted.
    
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginDisableNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginDisableInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function pluginDisable(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\PluginDisable($name), $fetch);
    }
    /**
    * 
    *
    * @param string $name The name of the plugin. The `:latest` tag is optional, and is the
    default if omitted.
    
    * @param \Tarekdj\Docker\ApiClient\Model\PluginPrivilege[] $body 
    * @param array $queryParameters {
    *     @var string $remote Remote reference to upgrade to.
    
    The `:latest` tag is optional, and is used as the default if omitted.
    
    * }
    * @param array $headerParameters {
    *     @var string $X-Registry-Auth A base64url-encoded auth configuration to use when pulling a plugin
    from a registry.
    
    Refer to the [authentication section](#section/Authentication) for
    details.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginUpgradeNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginUpgradeInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function pluginUpgrade(string $name, array $body, array $queryParameters = array(), array $headerParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\PluginUpgrade($name, $body, $queryParameters, $headerParameters), $fetch);
    }
    /**
    * 
    *
    * @param string|resource|\Psr\Http\Message\StreamInterface $tarContext Path to tar containing plugin rootfs and manifest
    * @param array $queryParameters {
    *     @var string $name The name of the plugin. The `:latest` tag is optional, and is the
    default if omitted.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginCreateInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function pluginCreate($tarContext, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\PluginCreate($tarContext, $queryParameters), $fetch);
    }
    /**
    * Push a plugin to the registry.
    
    *
    * @param string $name The name of the plugin. The `:latest` tag is optional, and is the
    default if omitted.
    
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginPushNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginPushInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function pluginPush(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\PluginPush($name), $fetch);
    }
    /**
    * 
    *
    * @param string $name The name of the plugin. The `:latest` tag is optional, and is the
    default if omitted.
    
    * @param array $body 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginSetNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\PluginSetInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function pluginSet(string $name, array $body, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\PluginSet($name, $body), $fetch);
    }
    /**
    * 
    *
    * @param array $queryParameters {
    *     @var string $filters Filters to process on the nodes list, encoded as JSON (a `map[string][]string`).
    
    Available filters:
    - `id=<node id>`
    - `label=<engine label>`
    - `membership=`(`accepted`|`pending`)`
    - `name=<node name>`
    - `node.label=<node label>`
    - `role=`(`manager`|`worker`)`
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\NodeListInternalServerErrorException
    * @throws \Tarekdj\Docker\ApiClient\Exception\NodeListServiceUnavailableException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\Node[]|\Psr\Http\Message\ResponseInterface
    */
    public function nodeList(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\NodeList($queryParameters), $fetch);
    }
    /**
     * 
     *
     * @param string $id The ID or name of the node
     * @param array $queryParameters {
     *     @var bool $force Force remove a node from the swarm
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\NodeDeleteNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\NodeDeleteInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\NodeDeleteServiceUnavailableException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function nodeDelete(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\NodeDelete($id, $queryParameters), $fetch);
    }
    /**
     * 
     *
     * @param string $id The ID or name of the node
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\NodeInspectNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\NodeInspectInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\NodeInspectServiceUnavailableException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\Node|\Psr\Http\Message\ResponseInterface
     */
    public function nodeInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\NodeInspect($id), $fetch);
    }
    /**
    * 
    *
    * @param string $id The ID of the node
    * @param \Tarekdj\Docker\ApiClient\Model\NodeSpec $body 
    * @param array $queryParameters {
    *     @var int $version The version number of the node object being updated. This is required
    to avoid conflicting writes.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\NodeUpdateBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\NodeUpdateNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\NodeUpdateInternalServerErrorException
    * @throws \Tarekdj\Docker\ApiClient\Exception\NodeUpdateServiceUnavailableException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function nodeUpdate(string $id, \Tarekdj\Docker\ApiClient\Model\NodeSpec $body, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\NodeUpdate($id, $body, $queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmInspectNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmInspectInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmInspectServiceUnavailableException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\Swarm|\Psr\Http\Message\ResponseInterface
     */
    public function swarmInspect(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SwarmInspect(), $fetch);
    }
    /**
     * 
     *
     * @param \Tarekdj\Docker\ApiClient\Model\SwarmInitPostBody $body 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmInitBadRequestException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmInitInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmInitServiceUnavailableException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function swarmInit(\Tarekdj\Docker\ApiClient\Model\SwarmInitPostBody $body, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SwarmInit($body), $fetch);
    }
    /**
     * 
     *
     * @param \Tarekdj\Docker\ApiClient\Model\SwarmJoinPostBody $body 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmJoinBadRequestException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmJoinInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmJoinServiceUnavailableException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function swarmJoin(\Tarekdj\Docker\ApiClient\Model\SwarmJoinPostBody $body, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SwarmJoin($body), $fetch);
    }
    /**
    * 
    *
    * @param array $queryParameters {
    *     @var bool $force Force leave swarm, even if this is the last manager or that it will
    break the cluster.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmLeaveInternalServerErrorException
    * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmLeaveServiceUnavailableException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function swarmLeave(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SwarmLeave($queryParameters), $fetch);
    }
    /**
    * 
    *
    * @param \Tarekdj\Docker\ApiClient\Model\SwarmSpec $body 
    * @param array $queryParameters {
    *     @var int $version The version number of the swarm object being updated. This is
    required to avoid conflicting writes.
    
    *     @var bool $rotateWorkerToken Rotate the worker join token.
    *     @var bool $rotateManagerToken Rotate the manager join token.
    *     @var bool $rotateManagerUnlockKey Rotate the manager unlock key.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmUpdateBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmUpdateInternalServerErrorException
    * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmUpdateServiceUnavailableException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function swarmUpdate(\Tarekdj\Docker\ApiClient\Model\SwarmSpec $body, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SwarmUpdate($body, $queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmUnlockkeyInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmUnlockkeyServiceUnavailableException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\SwarmUnlockkeyGetResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function swarmUnlockkey(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SwarmUnlockkey(), $fetch);
    }
    /**
     * 
     *
     * @param \Tarekdj\Docker\ApiClient\Model\SwarmUnlockPostBody $body 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmUnlockInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmUnlockServiceUnavailableException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function swarmUnlock(\Tarekdj\Docker\ApiClient\Model\SwarmUnlockPostBody $body, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SwarmUnlock($body), $fetch);
    }
    /**
    * 
    *
    * @param array $queryParameters {
    *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
    process on the services list.
    
    Available filters:
    
    - `id=<service id>`
    - `label=<service label>`
    - `mode=["replicated"|"global"]`
    - `name=<service name>`
    
    *     @var bool $status Include service status, with count of running and desired tasks.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceListInternalServerErrorException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceListServiceUnavailableException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\Service[]|\Psr\Http\Message\ResponseInterface
    */
    public function serviceList(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ServiceList($queryParameters), $fetch);
    }
    /**
    * 
    *
    * @param \Tarekdj\Docker\ApiClient\Model\ServicesCreatePostBody $body 
    * @param array $headerParameters {
    *     @var string $X-Registry-Auth A base64url-encoded auth configuration for pulling from private
    registries.
    
    Refer to the [authentication section](#section/Authentication) for
    details.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceCreateBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceCreateForbiddenException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceCreateConflictException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceCreateInternalServerErrorException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceCreateServiceUnavailableException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\ServicesCreatePostResponse201|\Psr\Http\Message\ResponseInterface
    */
    public function serviceCreate(\Tarekdj\Docker\ApiClient\Model\ServicesCreatePostBody $body, array $headerParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ServiceCreate($body, $headerParameters), $fetch);
    }
    /**
     * 
     *
     * @param string $id ID or name of service.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceDeleteNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceDeleteInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceDeleteServiceUnavailableException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function serviceDelete(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ServiceDelete($id), $fetch);
    }
    /**
     * 
     *
     * @param string $id ID or name of service.
     * @param array $queryParameters {
     *     @var bool $insertDefaults Fill empty fields with default values.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceInspectNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceInspectInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceInspectServiceUnavailableException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\Service|\Psr\Http\Message\ResponseInterface
     */
    public function serviceInspect(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ServiceInspect($id, $queryParameters), $fetch);
    }
    /**
    * 
    *
    * @param string $id ID or name of service.
    * @param \Tarekdj\Docker\ApiClient\Model\ServicesIdUpdatePostBody $body 
    * @param array $queryParameters {
    *     @var int $version The version number of the service object being updated. This is
    required to avoid conflicting writes.
    This version number should be the value as currently set on the
    service *before* the update. You can find the current version by
    calling `GET /services/{id}`
    
    *     @var string $registryAuthFrom If the `X-Registry-Auth` header is not specified, this parameter
    indicates where to find registry authorization credentials.
    
    *     @var string $rollback Set to this parameter to `previous` to cause a server-side rollback
    to the previous service spec. The supplied spec will be ignored in
    this case.
    
    * }
    * @param array $headerParameters {
    *     @var string $X-Registry-Auth A base64url-encoded auth configuration for pulling from private
    registries.
    
    Refer to the [authentication section](#section/Authentication) for
    details.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceUpdateBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceUpdateNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceUpdateInternalServerErrorException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceUpdateServiceUnavailableException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\ServiceUpdateResponse|\Psr\Http\Message\ResponseInterface
    */
    public function serviceUpdate(string $id, \Tarekdj\Docker\ApiClient\Model\ServicesIdUpdatePostBody $body, array $queryParameters = array(), array $headerParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ServiceUpdate($id, $body, $queryParameters, $headerParameters), $fetch);
    }
    /**
    * Get `stdout` and `stderr` logs from a service. See also
    [`/containers/{id}/logs`](#operation/ContainerLogs).
    
    **Note**: This endpoint works only for services with the `local`,
    `json-file` or `journald` logging drivers.
    
    *
    * @param string $id ID or name of the service
    * @param array $queryParameters {
    *     @var bool $details Show service context and extra details provided to logs.
    *     @var bool $follow Keep connection after returning logs.
    *     @var bool $stdout Return logs from `stdout`
    *     @var bool $stderr Return logs from `stderr`
    *     @var int $since Only return logs since this time, as a UNIX timestamp
    *     @var bool $timestamps Add timestamps to every log line
    *     @var string $tail Only return this number of log lines from the end of the logs.
    Specify as an integer or `all` to output all log lines.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceLogsNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceLogsInternalServerErrorException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceLogsServiceUnavailableException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function serviceLogs(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ServiceLogs($id, $queryParameters), $fetch);
    }
    /**
    * 
    *
    * @param array $queryParameters {
    *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
    process on the tasks list.
    
    Available filters:
    
    - `desired-state=(running | shutdown | accepted)`
    - `id=<task id>`
    - `label=key` or `label="key=value"`
    - `name=<task name>`
    - `node=<node id or name>`
    - `service=<service name>`
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\TaskListInternalServerErrorException
    * @throws \Tarekdj\Docker\ApiClient\Exception\TaskListServiceUnavailableException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\Task[]|\Psr\Http\Message\ResponseInterface
    */
    public function taskList(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\TaskList($queryParameters), $fetch);
    }
    /**
     * 
     *
     * @param string $id ID of the task
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\TaskInspectNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\TaskInspectInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\TaskInspectServiceUnavailableException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\Task|\Psr\Http\Message\ResponseInterface
     */
    public function taskInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\TaskInspect($id), $fetch);
    }
    /**
    * Get `stdout` and `stderr` logs from a task.
    See also [`/containers/{id}/logs`](#operation/ContainerLogs).
    
    **Note**: This endpoint works only for services with the `local`,
    `json-file` or `journald` logging drivers.
    
    *
    * @param string $id ID of the task
    * @param array $queryParameters {
    *     @var bool $details Show task context and extra details provided to logs.
    *     @var bool $follow Keep connection after returning logs.
    *     @var bool $stdout Return logs from `stdout`
    *     @var bool $stderr Return logs from `stderr`
    *     @var int $since Only return logs since this time, as a UNIX timestamp
    *     @var bool $timestamps Add timestamps to every log line
    *     @var string $tail Only return this number of log lines from the end of the logs.
    Specify as an integer or `all` to output all log lines.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\TaskLogsNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\TaskLogsInternalServerErrorException
    * @throws \Tarekdj\Docker\ApiClient\Exception\TaskLogsServiceUnavailableException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function taskLogs(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\TaskLogs($id, $queryParameters), $fetch);
    }
    /**
    * 
    *
    * @param array $queryParameters {
    *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
    process on the secrets list.
    
    Available filters:
    
    - `id=<secret id>`
    - `label=<key> or label=<key>=value`
    - `name=<secret name>`
    - `names=<secret name>`
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\SecretListInternalServerErrorException
    * @throws \Tarekdj\Docker\ApiClient\Exception\SecretListServiceUnavailableException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\Secret[]|\Psr\Http\Message\ResponseInterface
    */
    public function secretList(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SecretList($queryParameters), $fetch);
    }
    /**
     * 
     *
     * @param \Tarekdj\Docker\ApiClient\Model\SecretsCreatePostBody $body 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\SecretCreateConflictException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SecretCreateInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SecretCreateServiceUnavailableException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\IdResponse|\Psr\Http\Message\ResponseInterface
     */
    public function secretCreate(\Tarekdj\Docker\ApiClient\Model\SecretsCreatePostBody $body, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SecretCreate($body), $fetch);
    }
    /**
     * 
     *
     * @param string $id ID of the secret
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\SecretDeleteNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SecretDeleteInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SecretDeleteServiceUnavailableException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function secretDelete(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SecretDelete($id), $fetch);
    }
    /**
     * 
     *
     * @param string $id ID of the secret
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\SecretInspectNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SecretInspectInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SecretInspectServiceUnavailableException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\Secret|\Psr\Http\Message\ResponseInterface
     */
    public function secretInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SecretInspect($id), $fetch);
    }
    /**
    * 
    *
    * @param string $id The ID or name of the secret
    * @param \Tarekdj\Docker\ApiClient\Model\SecretSpec $body The spec of the secret to update. Currently, only the Labels field
    can be updated. All other fields must remain unchanged from the
    [SecretInspect endpoint](#operation/SecretInspect) response values.
    
    * @param array $queryParameters {
    *     @var int $version The version number of the secret object being updated. This is
    required to avoid conflicting writes.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\SecretUpdateBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\SecretUpdateNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\SecretUpdateInternalServerErrorException
    * @throws \Tarekdj\Docker\ApiClient\Exception\SecretUpdateServiceUnavailableException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function secretUpdate(string $id, \Tarekdj\Docker\ApiClient\Model\SecretSpec $body, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\SecretUpdate($id, $body, $queryParameters), $fetch);
    }
    /**
    * 
    *
    * @param array $queryParameters {
    *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
    process on the configs list.
    
    Available filters:
    
    - `id=<config id>`
    - `label=<key> or label=<key>=value`
    - `name=<config name>`
    - `names=<config name>`
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ConfigListInternalServerErrorException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ConfigListServiceUnavailableException
    *
    * @return null|\Tarekdj\Docker\ApiClient\Model\Config[]|\Psr\Http\Message\ResponseInterface
    */
    public function configList(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ConfigList($queryParameters), $fetch);
    }
    /**
     * 
     *
     * @param \Tarekdj\Docker\ApiClient\Model\ConfigsCreatePostBody $body 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ConfigCreateConflictException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ConfigCreateInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ConfigCreateServiceUnavailableException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\IdResponse|\Psr\Http\Message\ResponseInterface
     */
    public function configCreate(\Tarekdj\Docker\ApiClient\Model\ConfigsCreatePostBody $body, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ConfigCreate($body), $fetch);
    }
    /**
     * 
     *
     * @param string $id ID of the config
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ConfigDeleteNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ConfigDeleteInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ConfigDeleteServiceUnavailableException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function configDelete(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ConfigDelete($id), $fetch);
    }
    /**
     * 
     *
     * @param string $id ID of the config
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\ConfigInspectNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ConfigInspectInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ConfigInspectServiceUnavailableException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\Config|\Psr\Http\Message\ResponseInterface
     */
    public function configInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ConfigInspect($id), $fetch);
    }
    /**
    * 
    *
    * @param string $id The ID or name of the config
    * @param \Tarekdj\Docker\ApiClient\Model\ConfigSpec $body The spec of the config to update. Currently, only the Labels field
    can be updated. All other fields must remain unchanged from the
    [ConfigInspect endpoint](#operation/ConfigInspect) response values.
    
    * @param array $queryParameters {
    *     @var int $version The version number of the config object being updated. This is
    required to avoid conflicting writes.
    
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \Tarekdj\Docker\ApiClient\Exception\ConfigUpdateBadRequestException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ConfigUpdateNotFoundException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ConfigUpdateInternalServerErrorException
    * @throws \Tarekdj\Docker\ApiClient\Exception\ConfigUpdateServiceUnavailableException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function configUpdate(string $id, \Tarekdj\Docker\ApiClient\Model\ConfigSpec $body, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\ConfigUpdate($id, $body, $queryParameters), $fetch);
    }
    /**
     * Return image digest and platform information by contacting the registry.
     *
     * @param string $name Image name or id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\DistributionInspectUnauthorizedException
     * @throws \Tarekdj\Docker\ApiClient\Exception\DistributionInspectInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\DistributionInspect|\Psr\Http\Message\ResponseInterface
     */
    public function distributionInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\DistributionInspect($name), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Tarekdj\Docker\ApiClient\Exception\SessionBadRequestException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SessionInternalServerErrorException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function session(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Tarekdj\Docker\ApiClient\Endpoint\Session(), $fetch);
    }
    public static function create($httpClient = null, array $additionalPlugins = array(), array $additionalNormalizers = array())
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = array();
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = array(new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \Tarekdj\Docker\ApiClient\Normalizer\JaneObjectNormalizer());
        if (count($additionalNormalizers) > 0) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, array(new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(array('json_decode_associative' => true)))));
        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}