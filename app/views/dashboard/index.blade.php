<h3>{{ Trans('wts.dashboard_welcome', array('name' => Auth::user()->username)) }}</h3>
@include ('dashboard.partials.tabs', array('projects' => $projects, 'translations' => $translations, 'repositories' => $repositories, 'repo_html' => $repo_html))

 