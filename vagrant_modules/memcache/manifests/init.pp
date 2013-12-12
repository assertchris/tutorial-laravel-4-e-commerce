class memcache {

    Class["mysql"] -> Class["memcache"]

    package { "memcached":
        ensure => present
    }

    file { "/etc/memcached.conf":
        ensure  => file,
        content => template("memcache/memcached.conf.erb"),
        require => Package["memcached"]
    }

    service { "memcached":
        ensure    => running,
        subscribe => File["/etc/memcached.conf"]
    }

}