@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="main-content-inner">    
    <!-- En-tête avec informations utilisateur -->
    <div class="user-welcome">
        <div class="user-header">
            <div class="user-info">
                <div class="user-avatar">{{ substr($userProgress->getUsername(), 0, 1) }}</div>
                <h1 class="welcome-title">Bonjour {{ $userProgress->getUsername() }}</h1>
            </div>
        </div>
        
        <div class="progress-section-left">
            <h3 class="progress-title">Ma progression</h3>
            <div class="spotvip-progress">
                <div class="spotvip-bar" style="width: {{ $userProgress->getProgressPercentage() }}%;"></div>
            </div>
            <div class="spotvip-stats">
                <span>{{ $userProgress->getCurrentPoints() }} / {{ $userProgress->getMaxPoints() }} SPOINTS</span>
                <span>{{ $userProgress->getSpointsToNextLevel() }} points pour atteindre le niveau {{ $userProgress->getLevel() + 1 }}</span>
            </div>
        </div>
    </div>

    <div class="first-section">
        <!-- Mes playlists et suggestions de playlists -->
        <div class="section-row">
            <div class="column">
                <h2 class="section-title spotify-green">Mes playlists</h2>
                <div class="card-grid">
                    @foreach($userPlaylists as $playlist)
                    <a href="{{ route('playlistDetails', ['id' => $playlist->getId()]) }}" class="content-card playlist-link-card">
                        <img src="{{ $playlist->getImageUrl() }}" alt="{{ $playlist->getName() }}" class="card-cover">
                        <div class="playlist-info">
                            <div class="playlist-name">{{ $playlist->getName() }}</div>
                            <div class="playlist-count">{{ $playlist->getTracksCount() }} titres</div>
                        </div>
                        <div class="play-overlay">
                            <i class="fas fa-play"></i>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            
            <div class="vertical-divider"></div>
            
            <div class="column">
                <h2 class="section-title spotify-green">Playlists suggérées</h2>
                <div class="card-grid">
                    @foreach($suggestedPlaylists as $playlist)
                    <a href="{{ route('playlistDetails', ['id' => $playlist->getId()]) }}" class="content-card playlist-link-card">
                        <img src="{{ $playlist->getImageUrl() }}" alt="{{ $playlist->getName() }}" class="card-cover">
                        <div class="playlist-info">
                            <div class="playlist-name">{{ $playlist->getName() }}</div>
                            <div class="playlist-count">{{ $playlist->getTracksCount() }} titres</div>
                        </div>
                        <div class="play-overlay">
                            <i class="fas fa-play"></i>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Albums favoris et suggestions d'albums -->
        <div class="section-row">
            <div class="column">
                <h2 class="section-title spotify-green">Albums favoris</h2>
                <div class="card-grid">
                    <div class="content-card">
                        <img src="/img/album-1.png" alt="Album 1" class="card-cover">
                    </div>
                    <div class="content-card">
                        <img src="/img/album-2.png" alt="Album 2" class="card-cover">
                    </div>
                    <div class="content-card">
                        <img src="/img/album-8.png" alt="Album 3" class="card-cover">
                    </div>
                    <div class="content-card">
                        <img src="/img/album-9.png" alt="Album 4" class="card-cover">
                    </div>
                </div>
            </div>
            
            <div class="vertical-divider"></div>
            
            <div class="column">
                <h2 class="section-title spotify-green">Albums suggérés</h2>
                <div class="card-grid">
                    <div class="content-card">
                        <img src="/img/album-3.png" alt="Album suggéré 1" class="card-cover">
                    </div>
                    <div class="content-card">
                        <img src="/img/album-4.png" alt="Album suggéré 2" class="card-cover">
                    </div>
                    <div class="content-card">
                        <img src="/img/album-7.png" alt="Album suggéré 3" class="card-cover">
                    </div>
                    <div class="content-card">
                        <img src="/img/album-10.png" alt="Album suggéré 4" class="card-cover">
                    </div>
                </div>
            </div>
        </div>

        <!-- Mes artistes et suggestions d'artistes -->
        <div class="section-row">
            <div class="column">
                <h2 class="section-title spotify-green">Mes artistes</h2>
                <div class="card-grid">
                    <div class="content-card">
                        <img src="/img/david-guetta.jpeg" alt="David Guetta" class="card-cover artist-cover">
                    </div>
                    <div class="content-card">
                        <img src="/img/AT-_-GAZO.jpg" alt="Gazo" class="card-cover artist-cover">
                    </div>
                    <div class="content-card">
                        <img src="/img/gimd.jpg" alt="Artiste 1" class="card-cover artist-cover">
                    </div>
                    <div class="content-card ">
                        <img src="/img/guy2bezbar.jpg" alt="Artiste 2" class="card-cover artist-cover">
                    </div>
                </div>
            </div>
            
            <div class="vertical-divider"></div>
            
            <div class="column">
                <h2 class="section-title spotify-green">Artistes suggérés</h2>
                <div class="card-grid">
                    <div class="content-card">
                        <img src="/img/iam.avif" alt="Artiste suggéré 1" class="card-cover artist-cover">
                    </div>
                    <div class="content-card">
                        <img src="/img/david-guetta.jpeg" alt="Artiste suggéré 2" class="card-cover artist-cover">
                    </div>
                    <div class="content-card">
                        <img src="/img/AT-_-GAZO.jpg" alt="Artiste suggéré 3" class="card-cover artist-cover">
                    </div>
                    <div class="content-card">
                        <img src="/img/gimd.jpg" alt="Artiste suggéré 4" class="card-cover artist-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="second-section">
        <h2 class="section-title spotify-green full-width-title">Nouveautés</h2>
        <div class="card-grid wide-grid">
            @foreach($suggestedAlbums as $index => $album)
                <div class="content-card">
                    <img src="{{ $album->getImageUrl() }}" alt="{{ $album->getName() }}" class="card-cover">
                    <div class="card-info">
                        <div class="card-title">{{ $album->getName() }}</div>
                        <div class="card-subtitle">{{ $album->getArtist() }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .main-content-inner {
        transition: margin-left 0.3s ease;
        padding: 0 30px 30px 30px;
    }
    
    /* En-tête avec informations utilisateur */
    .user-welcome {
        margin-bottom: 40px;
        margin-left: 5vw;
    }
    
    .user-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    
    .user-info {
        display: flex;
        align-items: center;
    }
    
    .user-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: var(--spotify-green);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        font-weight: bold;
        margin-right: 15px;
        color: white;
    }
    
    .welcome-title {
        font-size: 2.5rem;
        font-weight: bold;
    }
    
    /* Barre de progression alignée à gauche */
    .progress-section-left {
        max-width: 500px;
        margin-top: 10px;
    }
    
    .progress-title {
        font-size: 16px;
        margin-bottom: 10px;
        color: var(--spotify-off-white);
        text-align: left;
    }
    
    .spotvip-progress {
        height: 8px;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
        overflow: hidden;
        margin-bottom: 8px;
    }
    
    .spotvip-bar {
        height: 100%;
        background-color: var(--spotify-green);
        border-radius: 4px;
    }
    
    .spotvip-stats {
        display: flex;
        justify-content: space-between;
        font-size: 12px;
        color: var(--spotify-off-white);
    }
    
    .first-section, .second-section {
        margin-bottom: 40px;
    }
    
    .section-row {
        display: flex;
        margin-bottom: 40px;
    }
    
    .second-section .section-row {
        margin-bottom: 0;
    }
    
    .column {
        flex: 1;
        padding: 0 80px;
    }
    
    .vertical-divider {
        width: 2px;
        background-color: var(--spotify-green);
        margin: 0 20px;
        height: auto;
    }
    
    .section-title {
        font-size: 1.4rem;
        font-weight: bold;
        margin-bottom: 15px;
    }
    
    .full-width-title {
        padding: 0 20px;
        margin-bottom: 20px;
    }
    
    .spotify-green {
        color: var(--spotify-green);
    }
    
    /* Grilles de cartes */
   
    .card-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .content-card {
        padding: 10px;
        width: 15vw;
        max-width: 250px;
        max-height: 350px;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
    }

    /* Style pour les cartes de playlists cliquables */
    .playlist-link-card {
        cursor: pointer;
        display: block;
        text-decoration: none;
        color: inherit;
        transition: transform 0.3s ease;
    }

    .playlist-link-card:hover {
        transform: scale(1.05);
    }

    .playlist-link-card:hover .play-overlay {
        opacity: 1;
        transform: translateY(0);
    }

    .playlist-info {
        padding: 5px 0;
    }

    .playlist-name {
        font-weight: 500;
        font-size: 14px;
        color: var(--spotify-white);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .playlist-count {
        font-size: 12px;
        color: var(--spotify-off-white);
    }

    .play-overlay {
        position: absolute;
        bottom: 30%;
        left: 10%;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background-color: var(--spotify-green);
        color: var(--spotify-black);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transform: translateY(10px);
        transition: opacity 0.3s ease, transform 0.3s ease;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .card-cover {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .mix-cover img {
        width: 50px;
        height: 50px;
        object-fit: cover;
    }

    .playlist-cover img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
    }
    
    .wide-grid {
        grid-template-columns: repeat(auto-fill, minmax(20vw, 1fr));
        gap: 15px;
    }
    
    /* Responsive */
    @media (max-width: 1024px) {
        .wide-grid {
        grid-template-columns: repeat(auto-fill, minmax(16vw, 1fr));
        }

        body.sidebar-open .main-content-inner {
            opacity: 0.7;
        }

        .content-card{
            width: 17vw;
            max-width: 200px;
        }

        .column{
        padding: 0;
        }

        .user-welcome {
            margin-left: none;
        }
}

    
    @media (max-width: 768px) {
        .section-row {
            flex-direction: column;
        }
        
        .vertical-divider {
            width: auto;
            height: 2px;
            margin: 20px 0;
        }
        
        .wide-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .search-container {
            margin-top: 30px;
        }
        
        .search-input-wrapper {
            max-width: 100%;
        }
        
        .progress-section-left {
            margin-left: 0;
        }
        
        .user-welcome {
            margin-bottom: 20px;
        }
        
        .welcome-title {
            font-size: 1.8rem;
        }

        .content-card{
            width: 30vw;
        }
    }
    
    @media (max-width: 480px) {

        .main-content-inner {
        transition: margin-left 0.3s ease;
        padding: 0 0px 30px 0px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            font-size: 20px;
        }
        
        .welcome-title {
            font-size: 1.5rem;
        }

        .content-card{
            width: 45vw; 
        }

        .card-grid{
            max-width: 350px;
            overflow-x: scroll;
            scrollbar-width: 0px;
            padding-bottom: 10px
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const playlistLinks = document.querySelectorAll('.playlist-link-card');
        
        playlistLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                if (e.target.closest('.play-overlay')) {
                    e.preventDefault();
                    
                    const playIcon = e.target.closest('.play-overlay').querySelector('i');
                    if (playIcon.classList.contains('fa-play')) {
                        playIcon.classList.remove('fa-play');
                        playIcon.classList.add('fa-pause');
                    } else {
                        playIcon.classList.remove('fa-pause');
                        playIcon.classList.add('fa-play');
                    }
                }
            });
        });
    });
</script>
@endpush