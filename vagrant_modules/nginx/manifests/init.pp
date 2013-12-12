class nginx {

    Class["memcache"] -> Class["nginx"]

    include nginx::params

    package { "nginx":
        ensure => present
    }

    exec { "permissions":
        command => "sudo chown -R www-data:www-data /var/www"
    }

    file { "/etc/nginx/nginx.conf":
        ensure  => file,
        content => template("nginx/nginx.conf.erb"),
        require => Package["nginx"]
    }

    file { "/etc/nginx/sites-enabled/${nginx::params::domain}":
        ensure  => file,
        content => template("nginx/default.erb"),
        require => File["/etc/nginx/nginx.conf"]
    }

    service { "nginx":
        ensure    => running,
        subscribe => [
            File["/etc/nginx/sites-enabled/${nginx::params::domain}"]
        ],
        require => File["/etc/nginx/sites-enabled/${nginx::params::domain}"]
    }

}