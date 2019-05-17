namespace :python_requirements do
    task :install_requirements do
        on roles(:app) do
            execute 'pip', 'install', '-r', release_path.join('phonemizer/requirements.txt')
        end
    end
end