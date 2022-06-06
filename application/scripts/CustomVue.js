const app = Vue.createApp({
	data() {
		return {
			comments: [],
		};
	},
	created: function () {
		this.fetchData();
	},
	methods: {
		fetchData: function () {
			$.get("http://localhost/games-review/response")
				.then((data) => {
					this.comments = JSON.parse(data);
				})
				.catch((err) => {
					console.log(err);
				});
		},
		sendData: function (UID, reviewID, UserName) {
			const newComment = $("#userComment").get(0).value;
			const postData = {
				UserName: UserName,
				UserID: UID,
				ReviewID: reviewID,
				UserComment: newComment,
			};

			$.post("http://localhost/games-review/send", postData)
				.then((data) => {
					console.log(data);
					this.comments.push(postData);
				})
				.catch((err) => {
					console.log(err);
				});

			$("#userComment").val("");
		},
	},
});

app.mount("#app");
