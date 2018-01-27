<h1 align="center"> TALKS :microphone: :microphone: </h1>

### Some of my talks and a little more :P

Comes with a [reveal-md](https://github.com/webpro/reveal-md) skeleton in the form of [talk.md](./talk.md) and a (maybe) handy util in the form of [`./talk`](./talk)

Talks drafts go in the [src/](./src) directory, you can `mkdir src/talk_name && cp talk.md src/talk_name` to create a talk.

When completed (presented) you can symlink to the [done/](./done) directory `ln -s ../src/talk_name done/talk_name`.

Or let the [util](./talk) do the job for you:

- Create the talk with (it will make the directory and copy the skeleton)
  ```sh
    ./talk talk:new talk_name
  ```

- List the talks to do with (it will list all the `src` talks not in )
  ```sh
    ./talk talks:todo
  ```

- Mark a talk as done (presented) with (it will symlink the `src` talk into the `done` folder)
  ```sh
    ./talk talk:done talk_name
  ```

- To present you just do a (will open an tab/window in your browser with the rendered talk)
  ```sh
    npm install && node_modules/.bin/reveal-md -w src/talk_name/talk.md
  ```

- To run a webserver showing all your done talks, run `npm install && npm run start`
  ```sh
    node_modules/.bin/reveal-md -w src/talk_name/talk.md
  ```

Do not forget to commit all the changes to `src` and `done` :smile:

Have a nice day :baby_chick:

- All the talks are licensed by [CC BY-SA 4.0](https://creativecommons.org/licenses/by-sa/4.0/)
