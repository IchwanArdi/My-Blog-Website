// Fetch channel details
$.ajax({
  url: 'https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCM_XYR_aEfnG-ovmdomcRmQ&key=AIzaSyBchVvyZyeJxqKD6hibgKJpMmm_Ydzp0Ok',
  type: 'get',
  dataType: 'json',
  success: function (result) {
    if (result.items && result.items.length > 0) {
      const youtubeProfilePicture = result.items[0]['snippet']['thumbnails']['medium']['url'];
      const channelName = result.items[0]['snippet']['title'];
      const subscriber = result.items[0]['statistics']['subscriberCount'];

      // Fetch the latest video
      $.ajax({
        url: 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyBchVvyZyeJxqKD6hibgKJpMmm_Ydzp0Ok&channelId=UCM_XYR_aEfnG-ovmdomcRmQ&maxResults=1&order=date&part=snippet',
        type: 'get',
        dataType: 'json',
        success: function (videoResult) {
          if (videoResult.items && videoResult.items.length > 0) {
            const urlLatestVideo = videoResult.items[0]['id']['videoId'];

            $('#youtube-details').append(`
                <div class="container" data-aos="fade-up" data-aos-duration="4000">
                  <div class="row justify-content-center">
                    <div class="col-md-2 mt-5 float-start">
                      <img src="${youtubeProfilePicture}" width="150" class="rounded-circle img-thumbnail profile-img" />
                    </div>
                    <div class="col-md-4 mt-3">
                      <h3>${channelName}</h3>
                      <h5 class="text-muted">${subscriber} Subscriber.</h5>
                      <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/${urlLatestVideo}?rel=0" class="embed-responsive-item" allowfullscreen></iframe>
                      </div>
                    </div>
                  </div>
                </div>`);
          } else {
            console.log('No video data found.');
          }
        },
        error: function () {
          console.log('Failed to fetch the latest video.');
        },
      });
    } else {
      console.log('No channel data found.');
    }
  },
  error: function () {
    console.log('Failed to fetch YouTube channel data.');
  },
});
