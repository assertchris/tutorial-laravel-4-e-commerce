Exec {
    path => [
        "/usr/sbin",
        "/usr/bin",
        "/sbin",
        "/bin"
    ]
}

include base
include mysql
include memcache
include nginx
include php