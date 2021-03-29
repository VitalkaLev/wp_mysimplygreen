# Next Generation WordPress Experience


## Development

1. Clone the GitHub repository: `git@github.secureserver.net:WordPress/nextgen.git` into your WordPress installations `wp-content/plugins` directory. The folder name should be `nextgen`.
2. Browse to the folder in the command line.
3. Run the `yarn install` command to install the plugin's dependencies.
4. Run the `yarn start` command to compile and watch source files for changes while developing.

## Local Docker Environment

Once Docker is installed and running, run this script to install WordPress, and build your local environment:

```
yarn env install
```

Run `yarn env stop` To stop the containers and `yarn env start` to start them back up (when the install command has already been run once).

Check the [wp-env documentation](https://www.npmjs.com/package/@wordpress/env) for available options.