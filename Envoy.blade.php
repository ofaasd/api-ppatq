@servers(['web' => 'ofaasd@103.187.147.220'])

@task('deploy')
    sudo su
    cd /var/www/api.ppatq-rf.id/public_html/
    git pull origin main
@endtask
