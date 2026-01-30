@servers(['web' => 'root@148.230.99.4'])

@task('deploy')
    sudo su
    cd /var/www/api.ppatq-rf.id/public_html/
    git pull origin main
@endtask
