class php (
    $path = "/usr/bin/php"
) {

    Class["nginx"] -> Class["php"]

    exec { "prepare-for-repository":
        command => "sudo apt-get install -y python-software-properties"
    }

    exec { "add-repository":
        command => "sudo add-apt-repository -y ppa:ondrej/php5",
        require => Exec["prepare-for-repository"]
    }

    exec { "update":
        command => "sudo apt-get update -y",
        require => Exec["add-repository"]
    }

    exec { "install-php":
        command => "sudo apt-get install -y php5-cli php5-common php5-mysql php5-gd php5-fpm php5-cgi php-pear php5-memcache php5-memcached php-apc php-soap php-xml-serializer php-xml-parser php5-geoip php5-mcrypt php5-curl php5-json",
        require => Exec["update"]
    }

    file { "/etc/php5/cgi/php.ini":
        ensure  => file,
        content => template("php/php.ini.erb"),
        require => Exec["install-php"]
    }

    file { "/etc/php5/cli/php.ini":
        ensure  => file,
        content => template("php/php.ini.erb"),
        require => Exec["install-php"]
    }

    file { "/etc/php5/fpm/php.ini":
        ensure  => file,
        content => template("php/php.ini.erb"),
        require => Exec["install-php"]
    }

}