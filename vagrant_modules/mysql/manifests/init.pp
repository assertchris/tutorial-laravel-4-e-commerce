class mysql {

    Class["base"] -> Class["mysql"]

    include mysql::params

    package { "mysql-server":
        ensure => present
    }

    file { "/etc/my.cnf":
        ensure  => file,
        content => template("mysql/my.cnf.erb"),
        require => Package["mysql-server"]
    }

    service { "mysql":
        ensure    => running,
        subscribe => File["/etc/my.cnf"]
    }

    exec { "mysql-root-password":
        command => "mysqladmin -u root password '${mysql::params::root}'",
        require => Service["mysql"],
        unless  => "mysql -u root -p${mysql::params::root}"
    }

    exec { "mysql-user":
        command => "echo \"CREATE USER '${mysql::params::user}'@'localhost' IDENTIFIED BY '${mysql::params::password}';\" | mysql -u root -p${mysql::params::root}",
        require => Exec["mysql-root-password"],
        unless  => "mysql -u ${mysql::params::user} -p${mysql::params::password}"
    }

    exec { "mysql-database":
        command => "echo \"CREATE DATABASE ${mysql::params::database}; GRANT ALL ON ${mysql::params::database}.* TO '${mysql::params::user}'@'localhost';\" | mysql -u root -p${mysql::params::root}",
        require => Exec["mysql-user"],
        unless  => "mysql -u ${mysql::params::user} -p${mysql::params::password} ${mysql::params::database}"
    }

}