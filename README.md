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

- To present you just do a (will open an tab/window in your browser with the listing of all the talks)
  ```sh
    npm install && ./talk talks:present
  ```

- To compile a talk (generate a pdf) (need to have the phantomjs executable on $PATH)
  Will generate an file to `dist/`
  ```sh
    ./talk talk:compile path/to/talk.md
  ```
  
- To compile all of the done talks, do a (will output the files to `dist/`)
  ```sh
    ./talk talks:compile:done
  ```


Do not forget to commit all the changes to `src` and `done` :smile:

Have a nice day :baby_chick:

- All the talks are licensed by [CC BY-SA 4.0](https://creativecommons.org/licenses/by-sa/4.0/)