namespace :load do
    task :defaults do
        set :build_path, 'public/build'
    end
end

namespace :assets do
    desc 'Build assets locally'
    task :build_local do
        run_locally do
            execute 'npm', 'install'
            execute 'npm', 'run', 'production'
        end
    end
    desc "Push build to server"
    task :deploy_build do
        on roles(:web) do
            from = fetch(:build_path)
            to = release_path.join(fetch(:build_path))
            info "Upload from local: \e[35m#{from}\e[0m to remote \e[35m#{to}\e[0m"
            upload! from, to, recursive: true
            upload! 'public/mix-manifest.json', release_path.join('public'), recursive: true
        end
    end
end