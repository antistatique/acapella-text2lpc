namespace :python_requirements do
    task :install_requirements do
        on roles(:app) do
            execute 'pip', 'install', '-r', 'phonemizer/requirements.txt'
        end
    end
end