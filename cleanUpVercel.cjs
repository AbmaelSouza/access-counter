const {exec} = require('child_process');
const util = require('util');
const execPromise = util.promisify(exec);

async function listAndRemove() {
    try {
        console.log('Listing deployments...');
        const {stdout, stderr} = await execPromise('vercel list');
        if (stderr) {
            console.error(`Error output: ${stderr}`);
        }

        const lines = stdout.split('\n').filter(line => line.includes('https://'));
        const urls = lines.map(line => {
            const parts = line.split(' ').filter(part => part.startsWith('https://'));
            return parts.length > 0 ? parts[0] : null;
        }).filter(Boolean);

        if (urls.length <= 5) {
            console.log('Only five URLs remain, stopping the script.');
            return;
        }

        const urlsToRemove = urls.slice(5);

        for (const url of urlsToRemove) {
            try {
                console.log(`Removing URL: ${url}`);
                const {stdout: removeStdout, stderr: removeStderr} = await execPromise(`vercel remove ${url} --yes`);
                if (removeStderr) {
                    console.error(`Error output removing ${url}: ${removeStderr}`);
                } else {
                    console.log(`Successfully removed ${url}`);
                }
            } catch (removeError) {
                console.error(`Error removing ${url}: ${removeError}`);
            }
        }

        await listAndRemove();

    } catch (error) {
        console.error(`Error executing vercel list: ${error}`);
    }
}

listAndRemove().then(()=>{console.log('script finished.')});
