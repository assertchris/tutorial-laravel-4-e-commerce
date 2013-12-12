class base {

    exec { "apt-update":
        command => "sudo apt-get update"
    }

}